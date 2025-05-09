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

        $review = new Review;
        $review->course_id = $course->id;
        $review->user_id = Auth::id() ?? null;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->status = 0;
        // dd($review);
        $review->save();

        return redirect()->route('courses.show', $course->id)
            ->with('success', 'Review submitted successfully!');
    }

}