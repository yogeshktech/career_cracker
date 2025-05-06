<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::latest()->paginate(10);
        return view('admin.faculties.index', compact('faculties'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.faculties.add',compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:faculties,email',
            'course_id' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:draft,published',
        ]);

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to create a faculty.');
        }

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/faculties');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image->move($path, $filename);
            $profileImage = 'uploads/faculties/' . $filename;

            Faculty::create([
                'name' => $request->name,
                'email' => $request->email,
                'course_id' => $request->course_id,
                'position' => $request->position,
                'experience' => $request->experience,
                'specialization' => $request->specialization,
                'profile_image' => $profileImage,
                'status' => $request->status,
                'created_by' => Auth::guard('admin')->id(),
            ]);

            return redirect()->route('admin.faculties.index')->with('success', 'Faculty created successfully.');
        }

        return redirect()->back()->with('error', 'Please upload a profile image.')->withInput();
    }

    public function edit($id)
    {
        $courses = Course::all();
        $faculty = Faculty::findOrFail($id);
        return view('admin.faculties.edit', compact('faculty','courses'));
    }

    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:faculties,email,' . $faculty->id,
            'course_id' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:draft,published',
        ]);

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to update a faculty.');
        }

        $profileImage = $faculty->profile_image;

        if ($request->hasFile('profile_image')) {
            if ($profileImage && file_exists(public_path($profileImage))) {
                unlink(public_path($profileImage));
            }
            $image = $request->file('profile_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/faculties');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image->move($path, $filename);
            $profileImage = 'uploads/faculties/' . $filename;
        }

        $faculty->update([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id,
            'position' => $request->position,
            'experience' => $request->experience,
            'specialization' => $request->specialization,
            'profile_image' => $profileImage,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.faculties.index')->with('success', 'Faculty updated successfully.');
    }

    public function destroy($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to delete a faculty.');
        }

        $faculty = Faculty::findOrFail($id);

        if ($faculty->profile_image && file_exists(public_path($faculty->profile_image))) {
            unlink(public_path($faculty->profile_image));
        }

        $faculty->delete();

        return redirect()->route('admin.faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}