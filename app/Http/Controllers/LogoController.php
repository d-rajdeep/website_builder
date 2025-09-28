<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::all();
        return view('admin.logos.index', compact('logos'));
    }

    public function create()
    {
        return view('admin.logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $path = $request->file('image')->store('logos', 'public');

        Logo::create([
            'image' => $path
        ]);

        return redirect()->route('logos.index')->with('success', 'Logo uploaded successfully.');
    }

    public function edit()
    {
        // Get first logo (or null if none exists)
        $logo = Logo::first();
        return view('admin.logos.edit', compact('logo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $logo = Logo::first();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('logos', 'public');

            if ($logo) {
                $logo->update(['image' => $path]);
            } else {
                Logo::create(['image' => $path]);
            }
        }

        return redirect()->route('logo.edit')->with('success', 'Logo updated successfully.');
    }

    public function destroy(Logo $logo)
    {
        $logo->delete();
        return redirect()->route('logos.index')->with('success', 'Logo deleted successfully.');
    }
}
