<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text'  => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $path = $request->file('image')->store('about', 'public');

        About::create([
            'title' => $request->title,
            'text'  => $request->text,
            'image' => $path,
        ]);

        return redirect()->route('about.index')->with('success', 'Slider uploaded successfully.');
    }


    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text'  => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $about = About::first();

        $data = [
            'title' => $request->title,
            'text'  => $request->text,
        ];

        if ($request->hasFile('image')) {
            // store new image
            $path = $request->file('image')->store('about', 'public');

            // optionally delete old image
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }

            $data['image'] = $path;
        }

        $about->update($data);

        return redirect()->route('about.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);

        // optionally delete old image
        if ($about->image && Storage::disk('public')->exists($about->image)) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();

        return redirect()->route('about.index')->with('success', 'Slider deleted successfully.');
    }
}
