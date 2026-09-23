<?php

namespace App\Http\Controllers;

use App\Models\blog as BlogModel;

class blog extends Controller
{
    public function index()
    {
        $blogs = BlogModel::where('status', 'published')->latest()->get();

        return view('blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = BlogModel::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('blog.show', compact('blog'));
    }
}
