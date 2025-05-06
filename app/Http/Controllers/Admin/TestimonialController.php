<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'content' => 'required',
            'designation' => 'required|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Make sure the directory exists
            $path = public_path('uploads/testimonials');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            
            // Move the file
            $image->move($path, $filename);
            $imagePath = 'uploads/testimonials/' . $filename;
            
            // Save testimonial
            Testimonial::create([
                'name' => $request->name,
                'content' => $request->content,
                'designation' => $request->designation,
                'image' => $imagePath,
            ]);
            
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
        }
        
        return redirect()->back()->with('error', 'Please upload an image')->withInput();
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'designation' => 'required|string|max:100',
        ]);

        $imagePath = $testimonial->image;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/testimonials');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $image->move($path, $filename);
            $imagePath = 'uploads/testimonials/' . $filename;
        }

        $testimonial->update([
            'name' => $request->name,
            'content' => $request->content,
            'image' => $imagePath,
            'designation' => $request->designation,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && file_exists(public_path($testimonial->image))) {
            unlink(public_path($testimonial->image));
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}