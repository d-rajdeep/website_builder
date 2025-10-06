<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contact = ContactInfo::first(); // single record
        return view('admin.contact.index', compact('contact'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'phone'   => 'required|string',
            'email'   => 'required|email',
            'map_link' => 'nullable|string',
        ]);

        ContactInfo::create($request->all());

        return redirect()->route('admin.contact.index')->with('success', 'Contact info added successfully.');
    }

    public function edit(ContactInfo $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, ContactInfo $contact)
    {
        $request->validate([
            'address' => 'required|string',
            'phone'   => 'required|string',
            'email'   => 'required|email',
            'map_link' => 'nullable|string',
        ]);

        $contact->update($request->all());

        return redirect()->route('contact.index')->with('success', 'Contact info updated successfully.');
    }
}
