<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Carrier;
use App\Models\Language;
use App\Models\Enquiry;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'published')->get();
        $testimonials = Testimonial::orderByDesc('created_at')->get();
        $blogs = Blog::orderByDesc('created_at')->limit(3)->get();
        return view('front.index', compact('blogs', 'testimonials', 'courses'));
    }

    public function AllCourse(Request $request)
    {
        $categories = Category::where('status', 'public')->get();
        $faculties = Faculty::where('status', 'published')->get();
        $languages = Language::where('status', '1')->get();

        $query = Course::where('status', 'published');

        // Sort By
        $sortBy = $request->input('sort-by', 'latest');
        if ($sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sortBy === 'title-asc') {
            $query->orderBy('title', 'asc');
        } elseif ($sortBy === 'title-desc') {
            $query->orderBy('title', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Category Filter
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->input('categories'));
        }

        // Instructor Filter
        if ($request->filled('instructors')) {
            $query->whereHas('faculties', function ($q) use ($request) {
                $q->whereIn('id', $request->input('instructors'));
            });
        }

        // Price Filter
        $price = $request->input('price', 'all');
        if ($price === 'free') {
            $query->where('sale_price', 0);
        } elseif ($price === 'paid') {
            $query->where('sale_price', '>', 0);
        }

        // Language Filter
        if ($request->filled('languages')) {
            $query->whereIn('language_id', $request->input('languages'));
        }

        // Level Filter
        if ($request->filled('levels')) {
            $query->whereIn('level', $request->input('levels'));
        }

        $courses = $query->paginate(12);
        $totalCourses = Course::where('status', 'published')->count();

        if ($request->ajax()) {
            return response()->json([
                'grid' => view('front.partials.course-grid', compact('courses'))->render(),
                'list' => view('front.partials.course-list', compact('courses'))->render(),
                'totalCourses' => $totalCourses,
            ]);
        }

        return view('front.course', compact('courses', 'categories', 'faculties', 'languages', 'totalCourses'));
    }

    public function show(Course $course)
    {
        // Fetch related courses by category, excluding the current one
        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', 'published')
            ->with(['faculties', 'creator', 'reviews'])
            ->latest()
            ->take(8)
            ->get();

        // Fetch categories for sidebar
        $categories = Category::where('status', 'public')->get();

        return view('front.courseDetails', compact('course', 'relatedCourses', 'categories'));
    }

    public function AllBlog()
    {
        $blogs = Blog::orderByDesc('created_at')->paginate(10);
        return view('front.blogs', compact('blogs'));
    }

    public function BlogDetails($id)
    {
        $blog = Blog::findOrFail($id);
        return view('front.blogdetails', compact('blog'));
    }
    

    public function Career()
    {
        return view('front.career');
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'resume' => 'required|file|mimes:pdf|max:5120',
        ]);

       

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $filename = time() . '_' . $resume->getClientOriginalName();
            $path = public_path('uploads/resumes');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $resume->move($path, $filename);
            $resumePath = 'uploads/resumes/' . $filename;

            Carrier::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'subject' => $request->subject,
                'resume' => $resumePath,
            ]);

            return redirect()->back()->with('success', 'Career applicant added successfully.');
        }

        return redirect()->back()->with('error', 'Please upload a resume.')->withInput();
    }

    public function enquiry_save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        Enquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->route('home')->with('success', 'Enquiry submitted successfully.');
    }

}