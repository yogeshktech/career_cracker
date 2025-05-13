<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'blog_image' => 'required|image|mimes:jpeg,png,webp,svg|max:5120',
            'description' => 'required|string',
        ]);

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to create a blog.');
        }

        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/blogs');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image->move($path, $filename);
            $blog_image = 'uploads/blogs/' . $filename;

            Blog::create([
                'title' => $request->title,
                'blog_image' => $blog_image,
                'description' => $request->description,
                'created_by' => Auth::guard('admin')->id(),
            ]);

            return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
        }

        return redirect()->back()->with('error', 'Please upload a blog image.')->withInput();
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:100',
            'blog_image' => 'nullable|image|mimes:jpeg,png,webp,svg|max:5120',
            'description' => 'required|string',
        ]);

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to update a blog.');
        }

        $blog_image = $blog->blog_image;

        if ($request->hasFile('blog_image')) {
            if ($blog_image && file_exists(public_path($blog_image))) {
                unlink(public_path($blog_image));
            }
            $image = $request->file('blog_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/blogs');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image->move($path, $filename);
            $blog_image = 'uploads/blogs/' . $filename;
        }

        $blog->update([
            'title' => $request->title,
            'blog_image' => $blog_image,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to delete a blog.');
        }

        $blog = Blog::findOrFail($id);

        if ($blog->blog_image && file_exists(public_path($blog->blog_image))) {
            unlink(public_path($blog->blog_image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}