<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle contact form submission.
     */
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sector' => 'required|string',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        \App\Models\ContactSubmission::create($validated);

        $locale = app()->getLocale();
        $message = $locale === 'id' 
            ? 'Terima kasih atas pesan Anda! Tim pakar kami akan menghubungi Anda kembali dalam waktu 24 jam.'
            : 'Thank you for your message! Our experts will get back to you within 24 hours.';

        return redirect()->back()->with('success', $message);
    }
}
