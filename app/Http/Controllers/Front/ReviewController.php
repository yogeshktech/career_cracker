<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Course $course)
    {
        // dd($request);
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        Review::create([
            'course_id' => $course->id,
            'user_id' => Auth::id() ?? null, // Optional: Link to authenticated user
            'rating' => $request->rating,
            'comment' => $request->comment,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('courses.show', $course->id)->with('success', 'Review submitted successfully!');
    }
}