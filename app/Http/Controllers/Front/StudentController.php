<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Course_user;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $enrolledCourses = $user->courses()->count();
        $activeCourses = $user->courses()
            ->wherePivot('progress', '<', 100)
            ->count();
        $completedCourses = $user->courses()->wherePivot('progress', '>=', 100)->count();
        
        $liveClasses = $user->courses()->wherePivot('google_meet_link', '!=', null)
            ->withPivot('google_meet_link', 'google_drive_link', 'progress', 'completed_lessons')
            ->get();
        return view('front.student.dashboard', compact('enrolledCourses', 'activeCourses', 'completedCourses', 'liveClasses'));
    }

    public function enrolledCourses()
    {
        $user = Auth::user();
        $enrolledCourses = $user->courses()->withPivot('google_meet_link', 'google_drive_link', 'progress', 'completed_lessons')->get();
        $liveClasses = $user->courses()->wherePivot('google_meet_link', '!=', null)->withPivot('google_meet_link', 'google_drive_link', 'progress', 'completed_lessons')->get();
        $completedCourses = $user->courses()->wherePivot('progress', '>=', 100)->withPivot('google_meet_link', 'google_drive_link', 'progress', 'completed_lessons')->get();
        
        $courseuser = Course_user::where('user_id', $user->id)->get();
        return view('front.student.enrolled-courses', compact('enrolledCourses', 'liveClasses', 'completedCourses', 'courseuser'));
    }

    public function profile()
    {
        $user = Auth::user();
        $liveClasses = $user->courses()->wherePivot('google_meet_link', '!=', null)->withPivot('google_meet_link', 'google_drive_link', 'progress', 'completed_lessons')->get();
        return view('front.student.profile', compact('user', 'liveClasses'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'job_title' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->job_title = $validatedData['job_title'] ?? $user->job_title;
        $user->contact_no = $validatedData['contact_no'] ?? $user->contact_no;
        $user->bio = $validatedData['bio'] ?? $user->bio;
        
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        
        if ($request->hasFile('cover_photo')) {
            if ($user->cover_photo) {
                Storage::delete('public/' . $user->cover_photo);
            }
            $coverPath = $request->file('cover_photo')->store('covers', 'public');
            $user->cover_photo = $coverPath;
        }
        
        $user->save();
        
        return redirect()->route('student.profile')->with('success', 'Profile updated successfully.');
    }

    public function purchaseHistory()
    {
        $user = Auth::user();
        $purchases = $user->purchases()->paginate();
        $liveClasses = $user->courses()->wherePivot('google_meet_link', '!=', null)->withPivot('google_meet_link', 'google_drive_link', 'progress', 'completed_lessons')->get();
        return view('front.student.purchase-history', compact('purchases', 'liveClasses'));
    }

    public function settings()
    {
        $user = Auth::user();
        $liveClasses = $user->courses()->wherePivot('google_meet_link', '!=', null)->withPivot('google_meet_link', 'google_drive_link', 'progress', 'completed_lessons')->get();
        return view('front.student.settings', compact('user', 'liveClasses'));
    }

    public function updateSettings(Request $request)
    {
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'current_password' => 'required|string',
            'new_password' => ['required', 'string', 'confirmed', Password::defaults()],
        ]);
        
        // Check if current password is correct
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect'])->withInput();
        }
        
        // Update password
        $user->password = Hash::make($validatedData['new_password']);
        $user->save();
        
        return redirect()->route('student.settings')->with('success', 'Password updated successfully.');
    }

    public function joinLiveClass(Course $course)
    {
        $user = Auth::user();
        $pivot = $user->courses()->where('course_id', $course->id)->first();
        \Log::info('JoinLiveClass Pivot Data', ['pivot' => $pivot ? $pivot->toArray() : null]);
        if ($pivot && $pivot->pivot->google_meet_link) {
            \Log::info('Redirecting to Google Meet', ['course_id' => $course->id, 'google_meet_link' => $pivot->pivot->google_meet_link]);
            return redirect($pivot->pivot->google_meet_link);
        }
        \Log::warning('No live class link available', ['course_id' => $course->id, 'user_id' => $user->id]);
        return redirect()->route('student.dashboard')->with('error', 'No live class link available.');
    }
}