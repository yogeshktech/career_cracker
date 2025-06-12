<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Carrier;
use App\Models\Language;
use App\Models\Subcategory;
use App\Models\Enquiry;
use App\Models\Newsletter;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'published')->limit(12)->get();
        $course_sale_no = Course::where('status', 'published')
                        ->where('is_saleable', 1)
                        ->get();
        // dd($course_sale_no);
        $testimonials = Testimonial::orderByDesc('created_at')->get();
        $blogs = Blog::orderByDesc('created_at')->limit(3)->get();

        $categories = Category::where('status', 'public')
            ->with([
                'subcategories' => function ($query) {
                    $query->where('status', 'public')
                        ->with([
                            'courses' => function ($query) {
                                $query->where('status', 'published')->take(3);
                            }
                        ]);
                }
            ])
            ->get();

        return view('front.index', compact('blogs', 'testimonials', 'courses', 'categories','course_sale_no'));
    }

    public function showCategory(Category $category)
    {
        $courses = Course::where('category_id', $category->id)
            ->where('status', 'published')
            ->paginate(12);
        $categories = Category::where('status', 'public')->get();
        $faculties = Faculty::where('status', 'published')->get();
        $languages = Language::where('status', '1')->get();
        $totalCourses = Course::where('status', 'published')->count();

        return view('front.course', compact('courses', 'categories', 'faculties', 'languages', 'totalCourses', 'category'));
    }

    public function showSubcategory(Subcategory $subcategory)
    {
        $courses = Course::where('subcategory_id', $subcategory->id)
            ->where('status', 'published')
            ->paginate(12);
        $categories = Category::where('status', 'public')->get();
        $faculties = Faculty::where('status', 'published')->get();
        $languages = Language::where('status', '1')->get();
        $totalCourses = Course::where('status', 'published')->count();

        return view('front.course', compact('courses', 'categories', 'faculties', 'languages', 'totalCourses', 'subcategory'));
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


    public function AllsearchCourse(Request $request)
    {
        $categories = Category::where('status', 'public')->get();
        $faculties = Faculty::where('status', 'published')->get();
        $languages = Language::where('status', '1')->get();

        $query = Course::where('status', 'published');

        // Search Filter
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('subcategory_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('mrp', 'like', '%' . $searchTerm . '%')
                    ->orWhere('category_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('sale_price', 'like', '%' . $searchTerm . '%')
                    ->orWhere('thumbnail', 'like', '%' . $searchTerm . '%')
                    ->orWhere('level', 'like', '%' . $searchTerm . '%')
                    ->orWhere('duration', 'like', '%' . $searchTerm . '%')
                    ->orWhere('is_live_class', 'like', '%' . $searchTerm . '%')
                    ->orWhere('total_lectures', 'like', '%' . $searchTerm . '%')
                    ->orWhere('language_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('overview', 'like', '%' . $searchTerm . '%')
                    ->orWhere('highlights', 'like', '%' . $searchTerm . '%')
                    ->orWhere('details', 'like', '%' . $searchTerm . '%')
                    ->orWhere('why_choose_us', 'like', '%' . $searchTerm . '%')
                    ->orWhere('created_by', 'like', '%' . $searchTerm . '%')
                    ->orWhere('progress', 'like', '%' . $searchTerm . '%');
            });
        }


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
        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', 'published')
            ->with(['faculties', 'creator', 'reviews'])
            ->latest()
            ->take(8)
            ->get()
            ->unique('id')
            ->values(); // Re-index the collection

        $categories = Category::where('status', 'public')->get();
        $all_course = Course::where('is_saleable', 1)->get();
        // dd($categories);
        return view('front.courseDetails', compact('course', 'relatedCourses', 'categories','all_course'));
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

        return redirect()->back()->with('success', 'Enquiry submitted successfully.');
    }


    public function NewsLetter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // Optional: Check if already subscribed
        $existing = Newsletter::where('email', $request->email)->first();
        if ($existing) {
            return back()->with('error', 'You are already subscribed.');
        }

        $news = new Newsletter();
        $news->email = $request->email;
        $news->save();

        return redirect()->back()->with('success', 'Subscribed successfully.');
    }

    public function FAQS()
    {
        $faqs = [
            [
                'question' => 'How is the training delivered?',
                'answer' => 'All courses are conducted online via platforms such as Zoom and Google Meet, allowing us to reach students from all parts of India. This format offers flexibility, convenience, and accessibility.'
            ],
            [
                'question' => 'Will I receive a certificate at the end of the course?',
                'answer' => 'Yes, upon completion of the course, you will receive a training certificate along with an experience letter.'
            ],
            [
                'question' => 'Is prior coding experience required?',
                'answer' => 'Coding experience is not mandatory and varies by course. If coding knowledge is needed, we will guide you from the basics to advanced levels within the course duration.'
            ],
            [
                'question' => 'What happens if I drop out midway?',
                'answer' => 'We are committed to supporting you throughout the course. However, if you find yourself needing to leave the course midway, we would value the opportunity to discuss your reasons and explore potential solutions together.'
            ],
            [
                'question' => 'How can I apply for the course?',
                'answer' => 'You can easily apply by sending us an email or joining our Telegram channel. Just fill in the required details and follow the instructions to complete the joining formalities.'
            ],
            [
                'question' => 'Is there a selection criterion?',
                'answer' => 'Yes, we have a selection process. We conduct a straightforward interview to assess the student\'s capabilities, vocabulary skills, and interest in learning.'
            ],
            [
                'question' => 'What is the "Pay After Placement" policy?',
                'answer' => 'Our "Pay After Placement" policy allows you to focus on your learning without upfront financial pressure. You only pay the course fee after you\'ve successfully secured a job placement.'
            ]
        ];

        return view('front.faqs', compact('faqs'));
    }

    public function TermCondition()
    {
        return view('front.term-condition');
    }

    public function privacyPolicy()
    {
        return view('front.privacy');
    }
}