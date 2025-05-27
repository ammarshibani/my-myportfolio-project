<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Profile;


class ContactController extends Controller
{
        public function index()
    {
        $profile = Profile::first();
        return view('contact', compact('profile'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('yammar673@gmail.com')->send(new ContactFormMail($data));

        return response()->json([
            'success' => true,
            'message' => __('Message sent successfully!')
        ]);
    }
}