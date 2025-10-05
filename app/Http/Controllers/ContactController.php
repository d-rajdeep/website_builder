<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|digits:10',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create($validated);

        return redirect('/')->with('success', 'Your message has been sent successfully!');
    }
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contact.messages', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        if (!$contactMessage->isRead()) {
            $contactMessage->markAsRead();
        }

        return view('admin.contact.show', compact('contactMessage'));
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact.messages')
            ->with('success', 'Message deleted successfully.');
    }
}
