<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::take(3)->get();
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'features.*.title' => 'required|string|max:255',
            'features.*.text'  => 'required|string',
            'features.*.icon'  => 'nullable|string|max:50',
        ]);

        foreach ($request->features as $data) {
            // only save if at least title and text are filled
            if (!empty($data['title']) && !empty($data['text'])) {
                Feature::create([
                    'title' => $data['title'],
                    'text'  => $data['text'],
                    'icon'  => $data['icon'] ?? null,
                ]);
            }
        }

        return redirect()->route('features.index')->with('success', 'Features added successfully.');
    }


    public function edit()
    {
        $features = Feature::take(3)->get(); // fetch first 3 features
        return view('admin.features.edit', compact('features'));
    }

    public function updateAll(Request $request)
    {
        $request->validate([
            'features.*.id'    => 'required|exists:features,id',
            'features.*.title' => 'required|string|max:255',
            'features.*.text'  => 'required|string',
            'features.*.icon'  => 'nullable|string|max:50',
        ]);

        foreach ($request->features as $data) {
            $feature = Feature::find($data['id']);
            $feature->update($data);
        }

        return redirect()->route('features.index')->with('success', 'Features updated successfully.');
    }


    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);

        $feature->delete();

        return redirect()->route('features.index')->with('success', 'Features deleted successfully.');
    }
}
