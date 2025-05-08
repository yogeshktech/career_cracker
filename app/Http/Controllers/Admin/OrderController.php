<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Mail\GoogleMeetLinkNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    

    public function index()
    {
        $courses = Course::with(['users' => function ($query) {
            $query->withPivot('google_meet_link', 'google_drive_link');
        }])
        ->withCount('users')
        ->having('users_count', '>', 0)
        ->get();

        return view('admin.orders.index', compact('courses'));
    }

    public function updateLinks(Request $request, Course $course)
    {
        try {
            $validated = $request->validate([
                'google_meet_link' => 'nullable|url|regex:/^https:\/\/meet\.google\.com\/[a-z0-9-]+$/',
                'google_drive_link' => 'nullable|url|regex:/^https:\/\/(drive\.google\.com\/|www\.google\.com\/drive\/)/',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }

        try {
            // Update links in course_user pivot for all enrolled students
            foreach ($course->users as $student) {
                $course->users()->updateExistingPivot($student->id, [
                    'google_meet_link' => $request->google_meet_link,
                    'google_drive_link' => $request->google_drive_link,
                    'updated_at' => now(),
                ]);
            }

            // Send email notification if Google Meet link is provided
            if ($request->google_meet_link) {
                foreach ($course->users as $student) {
                    Mail::to($student->email)->queue(new GoogleMeetLinkNotification($course, $request->google_meet_link));
                }
                Log::info('Google Meet link email queued for course ' . $course->id . ' to ' . $course->users->count() . ' students');
            }

            return redirect()->route('admin.orders.index')->with('success', 'Links updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update links for course ' . $course->id . ': ' . $e->getMessage());
            return redirect()->route('admin.orders.index')->with('warning', 'Failed to update links: ' . $e->getMessage());
        }
    }
}