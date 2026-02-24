<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
            'policy' => ['accepted'],
        ]);

        $contact = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'policy_accepted' => true,
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new \App\Mail\ContactMessageMail($contact));

        return back()->with('success', 'Сообщение отправлено!');
    }
}
