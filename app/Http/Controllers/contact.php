<?php

namespace App\Http\Controllers;

use App\Models\contact as ContactModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class contact extends Controller
{
    public function contact(): View
    {
        return view('contact.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30', 'regex:/^[0-9+().\s-]{7,30}$/'],
            'subject' => [
                'required',
                Rule::in(['Table Booking', 'Menu & Food', 'Private Event', 'Feedback', 'General Enquiry']),
            ],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        ContactModel::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Your message has been sent. Our café team will get back to you soon.');
    }
}
