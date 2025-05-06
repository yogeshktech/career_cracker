<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable',
            'status' => 'required|in:public,private',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Make sure the directory exists
            $path = public_path('uploads/category');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            
            // Move the file
            $image->move($path, $filename);
            $thumbnail = 'uploads/category/' . $filename;
            
            // Save category
            Category::create([
                'name' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'thumbnail' => $thumbnail,
            ]);
            
            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
        } else {
            return redirect()->back()->with('error', 'Please upload an image')->withInput();
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'status' => 'required|in:public,private',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:5120',
        ]);
        // dd($request->all());

        $thumbnail = $category->thumbnail;
        
        if ($request->hasFile('thumbnail')) {
            // Delete old image if exists
            if ($thumbnail && file_exists(public_path($thumbnail))) {
                unlink(public_path($thumbnail));
            }
            
            // Save new image
            $image = $request->file('thumbnail');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/category');
            
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            
            $image->move($path, $filename);
            $thumbnail = 'uploads/category/' . $filename;
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'thumbnail' => $thumbnail,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Delete image if exists
        if ($category->thumbnail && file_exists(public_path($category->thumbnail))) {
            unlink(public_path($category->thumbnail));
        }
        
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}