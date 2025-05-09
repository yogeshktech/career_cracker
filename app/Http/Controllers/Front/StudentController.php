<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Course_user;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $enrolledCourses = $user->courses()->count();
        $activeCourses = $user->courses()
            ->wherePivot('progress', '<', 100)
            // ->orWherePivot('google_meet_link', '!=', null)
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
        
        $courseuser = Course_user::where('user_id',$user->id)->get();//->where('course_id',$course->id)->first();
        return view('front.student.enrolled-courses', compact('enrolledCourses', 'liveClasses', 'completedCourses','courseuser'));
    }

    public function profile()
    {
        $user = Auth::user();
        $liveClasses = $user->courses()->wherePivot('google_meet_link', '!=', null)->withPivot('google_meet_link', 'google_drive_link', 'progress', 'completed_lessons')->get();
        return view('front.student.profile', compact('user', 'liveClasses'));
    }

    public function updateProfile(Request $request)
    {
        // Profile update logic
        return redirect()->route('student.profile')->with('success', 'Profile updated.');
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
        // Settings update logic
        return redirect()->route('student.settings')->with('success', 'Settings updated.');
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