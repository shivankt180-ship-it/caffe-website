<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class reservatiion extends Controller
{
    public function index()
    {
        return view('admin.reservation.index', [
            'bookings' => collect(),
        ]);
    }
}
