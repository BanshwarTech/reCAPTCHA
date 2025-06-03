<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ReCaptcha;

class GoogleController extends Controller
{
    public function post(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                // 'name' => 'required|string|max:255',
                // 'email' => 'required|email|max:255',
                // 'subject' => 'required|string|max:255',
                // 'message' => 'required|string',
                'g-recaptcha-response' => [new ReCaptcha()],
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Process the message (e.g., send email or save to database)
            // Example:
            // Mail::to('admin@example.com')->send(new ContactFormMail($request->all()));

            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
}
