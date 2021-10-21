<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function store(MailchimpNewsletter $newsletter, Request $request)
    {
        $request->validate([
           'email' => ['email', 'required']
        ]);

        try {
            $newsletter->subscribe($request->input('email'));
        } catch (Exception $e) {
            session()->flash('error', 'Email could not be added to our newsletter subscription');
            throw ValidationException::withMessages([
                'email' => 'Email could not be added to our newsletter subscription'
            ]);
        }

        return back()->with('success', 'Thanks! You\'r now added to our mail list');
    }
}
