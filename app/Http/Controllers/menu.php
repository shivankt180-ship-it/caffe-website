<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu as MenuModel;

class menu extends Controller
{
    public function menu()
    {
        $menu = MenuModel::where('status', 'published')
                         ->latest()
                         ->get();

        return view('menu.index', compact('menu'));
    }
}

