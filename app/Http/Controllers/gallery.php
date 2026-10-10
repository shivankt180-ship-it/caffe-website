<?php

namespace App\Http\Controllers;

use App\Models\gallery as GalleryItem;
use Illuminate\Contracts\View\View;

class gallery extends Controller
{
    public function gallery(): View
    {
        $gallery = GalleryItem::where('status', 'published')->latest()->get();

        return view('gallery', compact('gallery'));
    }
}
