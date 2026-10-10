<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog as Blog;
use App\Models\contact as ContactModel;
use App\Models\gallery as Gallery;
use App\Models\menu as Menu;
use App\Models\reservation as ReservationModel;
use App\Models\WebsiteUser;
use Illuminate\Contracts\View\View;

class dashboard extends Controller
{
    public function dashboard(): View
    {
        $reservationCount = ReservationModel::count();
        $pendingReservationCount = ReservationModel::where('status', 'pending')->count();
        $upcomingReservations = ReservationModel::query()
            ->whereDate('date', '>=', today())
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('date')
            ->orderBy('time')
            ->limit(4)
            ->get();
        $contactCount = ContactModel::count();
        $recentContacts = ContactModel::latest()->limit(5)->get();
        $blogCount = Blog::count();
        $publishedBlogCount = Blog::where('status', 'published')->count();
        $recentBlogs = Blog::latest()->limit(5)->get();
        $menuCount = Menu::count();
        $publishedMenuCount = Menu::where('status', 'published')->count();
        $galleryCount = Gallery::count();
        $publishedGalleryCount = Gallery::where('status', 'published')->count();
        $customerCount = WebsiteUser::where('is_admin', false)->count();

        return view('admin.dashboard.index', compact(
            'reservationCount',
            'pendingReservationCount',
            'upcomingReservations',
            'contactCount',
            'recentContacts',
            'blogCount',
            'publishedBlogCount',
            'recentBlogs',
            'menuCount',
            'publishedMenuCount',
            'galleryCount',
            'publishedGalleryCount',
            'customerCount',
        ));
    }
}
