<?php

namespace App\Http\Controllers;

use App\Models\reservation as ReservationModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class reservation extends Controller
{
    public function index(): View
    {
        return view('reservation.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[0-9+().\s-]{7,30}$/'],
            'date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
            'time' => ['required', 'date_format:H:i'],
            'guests' => ['required', 'integer', 'between:1,20'],
        ]);

        ReservationModel::create($validated);

        return redirect()
            ->route('index')
            ->with('success', 'Your table request has been received. We will confirm it shortly.');
    }
}
