<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::take(3)->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'services.*.title'       => 'nullable|string|max:255',
            'services.*.description' => 'nullable|string',
            'services.*.icon'        => 'nullable|string|max:50',
        ]);

        foreach ($request->services as $data) {
            // only save if at least title or description is filled
            if (!empty($data['title']) || !empty($data['description'])) {
                Service::create([
                    'title'       => $data['title'] ?? null,
                    'description' => $data['description'] ?? null,
                    'icon'        => $data['icon'] ?? null,
                ]);
            }
        }

        return redirect()->route('services.index')->with('success', 'Services added successfully.');
    }


    public function edit()
    {
        $services = Service::take(6)->get();
        return view('admin.services.edit', compact('services'));
    }

    public function updateAll(Request $request)
    {
        $request->validate([
            'services.*.id'          => 'required|exists:services,id', // keep ID required
            'services.*.title'       => 'nullable|string|max:255',
            'services.*.description' => 'nullable|string',
            'services.*.icon'        => 'nullable|string|max:50',
        ]);

        foreach ($request->services as $data) {
            $service = Service::find($data['id']);

            // update only fields provided
            $service->update([
                'title'       => $data['title'] ?? $service->title,
                'description' => $data['description'] ?? $service->description,
                'icon'        => $data['icon'] ?? $service->icon,
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Services updated successfully.');
    }



    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Services deleted successfully.');
    }
}
