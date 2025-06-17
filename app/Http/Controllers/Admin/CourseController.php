<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Language;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(12);

        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        $languages = Language::where('status', '1')->get();
        $categories = Category::where('status', 'public')->get();
        $subcategories = Subcategory::where('status', 'public')->get();
        return view('admin.course.add', compact('categories', 'subcategories', 'languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'title' => 'required|max:100',
            'mrp' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'thumbnail' => 'required|mimetypes:image/jpeg,image/png,image/webp,image/svg',
            'level' => 'nullable|string',
            'duration' => 'nullable|string',
            'total_lectures' => 'nullable|integer|min:0',
            'language_id' => 'nullable',
            'overview' => 'nullable|string',
            'highlights' => 'nullable|string',
            'details' => 'nullable|string',
            'why_choose_us' => 'nullable|string',
            'progress' => 'nullable|integer|min:0|max:100',
            'status' => 'required|in:draft,published',
            'is_saleable' => 'required|boolean',
            'max_lpa' => 'nullable',
            'min_lpa' => 'nullable',
            'pre_demo_start_date' => 'nullable',
            'pre_demo_end_date' => 'nullable',
            'regular_class_date' => 'nullable',
        ]);

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged as an admin to create a course.');
        }

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('Uploads/course');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image->move($path, $filename);
            $thumbnail = 'Uploads/course/' . $filename;

            Course::create([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'title' => $request->title,
                'mrp' => $request->mrp,
                'sale_price' => $request->sale_price,
                'thumbnail' => $thumbnail,
                'level' => $request->level,
                'duration' => $request->duration,
                'total_lectures' => $request->total_lectures,
                'language_id' => $request->language_id,
                'overview' => $request->overview,
                'highlights' => $request->highlights,
                'details' => $request->details,
                'why_choose_us' => $request->why_choose_us,
                'created_by' => Auth::guard('admin')->id(),
                'progress' => $request->progress ?? 0,
                'status' => $request->status,
                'is_saleable' => $request->is_saleable, 
                'max_lpa' => $request->max_lpa,
                'min_lpa' => $request->min_lpa,
                'pre_demo_start_date' => $request->pre_demo_start_date,
                'pre_demo_end_date' => $request->pre_demo_end_date,
                'regular_class_date' => $request->regular_class_date,
            ]);

            return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
        }

        return redirect()->back()->with('error', 'Please upload a thumbnail image')->withInput();
    }

    public function edit($id)
    {
        $languages = Language::where('status', '1')->get();
        $course = Course::findOrFail($id);
        $categories = Category::where('status', 'public')->get();
        $subcategories = Subcategory::where('status', 'public')->get();
        return view('admin.course.edit', compact('course', 'categories', 'subcategories', 'languages'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $course = Course::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'title' => 'required|max:100',
            'mrp' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|mimetypes:image/jpeg,image/png,image/webp,image/svg',
            'level' => 'nullable|string',
            'duration' => 'nullable|string',
            'total_lectures' => 'nullable|integer|min:0',
            'language_id' => 'nullable',
            'overview' => 'nullable|string',
            'highlights' => 'nullable|string',
            'details' => 'nullable|string',
            'why_choose_us' => 'nullable|string',
            'progress' => 'nullable|integer|min:0|max:100',
            'status' => 'required|in:draft,published',
            'is_saleable' => 'required|boolean',
            'max_lpa' => 'nullable',
            'min_lpa' => 'nullable',
            'pre_demo_start_date' => 'nullable',
            'pre_demo_end_date' => 'nullable',
            'regular_class_date' => 'nullable',
        ]);

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to update a course.');
        }

        $thumbnail = $course->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($thumbnail && file_exists(public_path($thumbnail))) {
                unlink(public_path($thumbnail));
            }
            $image = $request->file('thumbnail');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('Uploads/course');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image->move($path, $filename);
            $thumbnail = 'Uploads/course/' . $filename;
        }

        $course->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'title' => $request->title,
            'mrp' => $request->mrp,
            'sale_price' => $request->sale_price,
            'thumbnail' => $thumbnail,
            'level' => $request->level,
            'duration' => $request->duration,
            'total_lectures' => $request->total_lectures,
            'language_id' => $request->language_id,
            'overview' => $request->overview,
            'highlights' => $request->highlights,
            'details' => $request->details,
            'why_choose_us' => $request->why_choose_us,
            'progress' => $request->progress ?? 0,
            'status' => $request->status,
            'is_saleable' => $request->is_saleable,
            'max_lpa' => $request->max_lpa,
            'min_lpa' => $request->min_lpa,
            'pre_demo_start_date' => $request->pre_demo_start_date,
            'pre_demo_end_date' => $request->pre_demo_end_date,
            'regular_class_date' => $request->regular_class_date,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->thumbnail && file_exists(public_path($course->thumbnail))) {
            unlink(public_path($course->thumbnail));
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}