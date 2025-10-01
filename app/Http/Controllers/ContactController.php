<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // Show contact form (FRONTEND)
    public function create()
    {
        return view('admin.contact.show'); // This should be your frontend contact page
    }

    // Store contact message
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|size:10|regex:/^[0-9]{10}$/',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'captcha' => 'required|captcha'
        ], [
            'mobile.size' => 'The mobile number must be exactly 10 digits.',
            'mobile.regex' => 'The mobile number must contain only numbers.',
            'captcha.captcha' => 'Invalid captcha code.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        ContactMessage::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully! We will get back to you soon.'
        ]);
    }

    // Admin - Show all messages
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contact.messages', compact('messages'));
    }

    // Admin - Show single message
    public function show($id)
    {
        $contactMessage = ContactMessage::findOrFail($id);

        // Mark as read
        if (!$contactMessage->is_read) {
            $contactMessage->update(['is_read' => true]);
        }

        return view('admin.contact.show', compact('contactMessage'));
    }

    // Admin - Delete message
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact.messages')->with('success', 'Message deleted successfully.');
    }

    // Reload captcha
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
