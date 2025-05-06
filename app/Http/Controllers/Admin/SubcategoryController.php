<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::latest()->paginate(10);
        return view('admin.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:100',
            'description' => 'nullable',
            'status' => 'required|in:public,private',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            $path = public_path('uploads/subcategory');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            
            $image->move($path, $filename);
            $thumbnail = 'uploads/subcategory/' . $filename;
            
            Subcategory::create([
                'category_id' => $request->category_id,
                'name' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'thumbnail' => $thumbnail,
            ]);
            
            return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory created successfully.');
        }
        
        return redirect()->back()->with('error', 'Please upload an image')->withInput();
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:100',
            'description' => 'nullable',
            'status' => 'required|in:public,private',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $thumbnail = $subcategory->thumbnail;
        
        if ($request->hasFile('thumbnail')) {
            if ($thumbnail && file_exists(public_path($thumbnail))) {
                unlink(public_path($thumbnail));
            }
            
            // Save new image
            $image = $request->file('thumbnail');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/subcategory');
            
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            
            $image->move($path, $filename);
            $thumbnail = 'uploads/subcategory/' . $filename;
        }

        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'thumbnail' => $thumbnail,
        ]);

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        
        if ($subcategory->thumbnail && file_exists(public_path($subcategory->thumbnail))) {
            unlink(public_path($subcategory->thumbnail));
        }
        
        $subcategory->delete();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}