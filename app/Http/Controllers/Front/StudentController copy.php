<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Purchase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{


    public function dashboard()
    {
        $student = Auth::user();

        // Calculate dashboard metrics
        $enrolledCourses = $student->courses()->count();
        $activeCourses = $student->courses()->wherePivot('progress', '>', 0)->wherePivot('progress', '<', 100)->count();
        $completedCourses = $student->courses()->wherePivot('progress', 100)->count();

        return view('front.student.dashboard', compact('student', 'enrolledCourses', 'activeCourses', 'completedCourses'));
    }

    public function profile()
    {
        $student = Auth::user();
        return view('front.student.profile', compact('student'));
    }

    public function updateProfile(Request $request)
    {
        $student = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $student->id,
            'contact_no' => 'nullable|string|max:20',
            'job_title' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'contact_no', 'job_title', 'bio']);

        if ($request->hasFile('avatar')) {
            if ($student->avatar && Storage::disk('public')->exists($student->avatar)) {
                Storage::disk('public')->delete($student->avatar);
            }
            $avatarPath = $request->file('avatar')->store('students', 'public');
            $data['avatar'] = $avatarPath;
        }

        if ($request->hasFile('cover_photo')) {
            if ($student->cover_photo && Storage::disk('public')->exists($student->cover_photo)) {
                Storage::disk('public')->delete($student->cover_photo);
            }
            $coverPath = $request->file('cover_photo')->store('students', 'public');
            $data['cover_photo'] = $coverPath;
        }

        $student->update($data);
        return redirect()->route('student.settings')->with('success', 'Profile updated successfully.');
    }

    public function enrolledCourses()
    {
        $student = Auth::user();
        $enrolledCourses = $student->courses()->with('lessons')->get()->map(function ($course) {
            $course->progress = $course->pivot->progress;
            $course->completed_lessons = $course->pivot->completed_lessons;
            return $course;
        });
        $liveClasses = $enrolledCourses->filter(function ($course) {
            return $course->is_live_class;
        });
        $completedCourses = $enrolledCourses->filter(function ($course) {
            return $course->progress >= 100;
        });
        return view('front.student.enrolled-courses', compact('student', 'enrolledCourses', 'liveClasses', 'completedCourses'));
    }

    public function purchaseHistory()
    {
        $student = Auth::user();
        $purchases = Purchase::where('user_id', $student->id)
            ->with('course')
            ->orderBy('date', 'desc')
            ->paginate(10);
        Log::info('Purchase count for user ' . $student->id . ': ' . $purchases->count());
        return view('front.student.purchase-history', compact('purchases'));
    }

    public function settings()
    {
        $student = Auth::user();
        return view('front.student.settings', compact('student'));
    }

    public function updateSettings(Request $request)
    {
        $student = Auth::user();
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        if (!Hash::check($request->current_password, $student->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
        $student->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->route('student.settings')->with('success', 'Password updated successfully.');
    }

    public function joinLiveClass(Course $course)
    {
        $student = Auth::user();
        if (!$student->courses()->where('course_id', $course->id)->exists()) {
            abort(403, 'Unauthorized: You are not enrolled in this course.');
        }
        if (!$course->is_live_class) {
            abort(404, 'This course is not a live class.');
        }
        return view('front.student.live-class', compact('course', 'student'));
    }
}