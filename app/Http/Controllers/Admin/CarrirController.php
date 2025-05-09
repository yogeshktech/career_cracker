<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carrier;
use App\Models\Enquiry;
use App\Models\Newsletter;
use App\Models\Review;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class CarrirController extends Controller
{
    public function index()
    {
        $careers = Carrier::latest()->paginate(10);
        return view('admin.career.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

   
    public function destroy($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to delete a career applicant.');
        }

        $career = Carrier::findOrFail($id);

        if ($career->resume && file_exists(public_path($career->resume))) {
            unlink(public_path($career->resume));
        }

        $career->delete();

        return redirect()->route('career.index')->with('success', 'Career applicant deleted successfully.');
    }

    public function viewEnquiry()
    {
        $enqueries = Enquiry::orderByDesc('created_at')->paginate('12');
        return view('admin.career.enquiry',compact('enqueries'));
    }

    public function delete($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to delete a career applicant.');
        }
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->back()->with('success', 'Enquiry applicant deleted successfully.');

    }

    public function newsLetter()
    {
       $newsletters = Newsletter::orderByDesc('created_at')->paginate('10');
        // dd($newsletters);
        return view('admin.career.news_latter',compact('newsletters'));
    }
    

    public function newsLetterDelete($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to delete a career applicant.');
        }
        $news = Newsletter::findOrFail($id);
        $news->delete();
        return redirect()->back()->with('success', 'News Letter deleted successfully.');
    }


    public function reviews()
    {
        $reviews = Review::with('course')->paginate(20);
        return view('admin.career.review', compact('reviews'));
    }

    public function createReview()
    {
        $courses = Course::all(); // Fetch all courses for the dropdown
        return view('admin.career.add_review', compact('courses'));
    }

    public function addReview(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'rating' => 'required|integer|between:1,5',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        $userId = null;
        if (Auth::guard('admin')->check()) {
            // Check if the admin's ID corresponds to a user in the users table
            $adminId = Auth::guard('admin')->id();
            $user = User::find($adminId);
            if ($user) {
                $userId = $adminId;
            }
        }

        $review = new Review;
        $review->course_id = $request->course_id;
        $review->user_id = $userId; // Set to null if no valid user
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->status = 0; // Default to "Not Approved"
        $review->save();

        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully.');
    }

    public function reviewDelete(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }

    public function toggleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $review = Review::findOrFail($id);
        $review->status = $request->input('status');
        $review->save();

        return response()->json([
            'success' => true,
            'message' => 'Review status updated successfully.',
            'status' => $review->status,
        ]);
    }
}
