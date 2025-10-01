<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1048',
        ]);

        $data = [
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Only store image if provided
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('testimonial', 'public');
            $data['image'] = $path;
        }

        Testimonial::create($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'description' => 'required|string',
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1048',
        ]);

        $data = [
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Update image only if new one is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image && Storage::disk('public')->exists($testimonial->image)) {
                Storage::disk('public')->delete($testimonial->image);
            }

            $path = $request->file('image')->store('testimonial', 'public');
            $data['image'] = $path;
        }

        $testimonial->update($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        // Delete the image file if exists
        if ($testimonial->image && Storage::disk('public')->exists($testimonial->image)) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
