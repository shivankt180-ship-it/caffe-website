<?php

namespace App\Http\Controllers;

use App\Models\blog as Blog;
use App\Models\gallery as Gallery;
use App\Models\menu as Menu;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class home extends Controller
{
    public function home(): View
    {
        $galleryItems = Gallery::where('status', 'published')->latest()->limit(6)->get();
        $heroVideo = SiteSetting::get('hero_video');
        $storyPhoto = SiteSetting::get('story_photo');

        return view('home.index', [
            'featuredMenu' => Menu::where('status', 'published')->latest()->limit(5)->get(),
            'recentBlogs' => Blog::where('status', 'published')->latest()->limit(2)->get(),
            'galleryItems' => $galleryItems,
            'heroVideo' => $heroVideo,
            'heroVideoType' => match (strtolower(pathinfo((string) $heroVideo, PATHINFO_EXTENSION))) {
                'webm' => 'video/webm',
                'mov' => 'video/quicktime',
                default => 'video/mp4',
            },
            'storyPhoto' => $storyPhoto,
            'storyPhotoFallback' => $galleryItems->first()?->image,
        ]);
    }
}
