<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text'  => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $path = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'title' => $request->title,
            'text'  => $request->text,
            'image' => $path,
        ]);

        return redirect()->route('sliders.index')->with('success', 'Slider uploaded successfully.');
    }


    public function edit()
    {
        $slider = Slider::first();
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text'  => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $slider = Slider::first();

        $data = [
            'title' => $request->title,
            'text'  => $request->text,
        ];

        if ($request->hasFile('image')) {
            // store new image
            $path = $request->file('image')->store('sliders', 'public');

            // optionally delete old image
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            $data['image'] = $path;
        }

        $slider->update($data);

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // optionally delete old image
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
