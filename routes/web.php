<?php

use App\Http\Controllers\admin\bloga;
use App\Http\Controllers\admin\contacts;
use App\Http\Controllers\admin\dashboard;
use App\Http\Controllers\admin\gallerya;
use App\Http\Controllers\admin\menue;
use App\Http\Controllers\admin\reservatiion;
use App\Http\Controllers\admin\siteMedia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\blog;
use App\Http\Controllers\contact;
use App\Http\Controllers\gallery;
use App\Http\Controllers\home;
use App\Http\Controllers\menu;
use App\Http\Controllers\reservation;
use Illuminate\Support\Facades\Route;


Route::get('/', [home::class, 'home'])->name('home');
Route::get('/table', [reservation::class, 'index'])->name('index');
Route::post('/table', [reservation::class, 'store'])->middleware('throttle:6,1')->name('reservation.store');
Route::get('/menu', [menu::class, 'menu'])->name('menu');
Route::get('/blog', [blog::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [blog::class, 'show'])->name('blog.show');
Route::get('/contact', [contact::class, 'contact'])->name('contact');
Route::get('/gallery', [gallery::class, 'gallery'])->name('gallery');
Route::post('/contact', [contact::class, 'store'])->middleware('throttle:6,1')->name('contact.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [dashboard::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/site-media', [siteMedia::class, 'edit'])->name('admin.site-media.edit');
    Route::put('/admin/site-media', [siteMedia::class, 'update'])->name('admin.site-media.update');

    Route::get('/admin/reservations', [reservatiion::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservatiion', [reservatiion::class, 'index'])->name('reservatiion');
    Route::patch('/admin/reservatiion/{reservation}/status', [reservatiion::class, 'updateStatus'])->name('admin.reservations.status');
    Route::delete('/admin/reservatiion/{reservation}', [reservatiion::class, 'destroy'])->name('admin.reservations.destroy');

    Route::get('/admin/menue/index', [menue::class, 'index'])->name('admin.menue.index');

    Route::get('/admin/menue/create', [menue::class, 'create'])->name('admin.menue.create');

    Route::get('/admin/menue/edit', [menue::class, 'redirectLegacyEdit'])->name('admin.menue.legacy-edit');
    Route::get('/admin/menue/{id}/edit', [menue::class, 'edit'])->name('admin.menue.edit');
    Route::put('/admin/menue/{id}', [menue::class, 'update'])->name('admin.menue.update');
    Route::delete('/admin/menue/{id}', [menue::class, 'destroy'])->name('admin.menue.destroy');

    Route::get('/admin/blogs', [bloga::class, 'index'])->name('admin.blogs.index');
    Route::get('/admin/blogs/create', [bloga::class, 'create'])->name('admin.blogs.create');

    Route::post('/admin/blogs', [bloga::class, 'store'])->name('admin.blogs.store');

    Route::post('/admin/menu', [menue::class, 'store'])->name('admin.menue.store');

    Route::get('/admin/blogs/{id}/edit', [bloga::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/admin/blogs/{id}', [bloga::class, 'update'])->name('admin.blogs.update');
    Route::delete('/admin/blogs/{id}', [bloga::class, 'destroy'])->name('admin.blogs.destroy');

    Route::get('/admin/contacts', [contacts::class, 'index'])->name('contacts');
    // Route::get('/admin/contacts/index', [contacts::class, 'index'])->name('contacts.index');

    Route::get('/admin/gallery', [gallerya::class, 'index'])->name('admin.gallery.index');
    Route::get('/admin/gallery/create', [gallerya::class, 'create'])->name('admin.gallery.create');
    Route::post('/admin/gallery', [gallerya::class, 'store'])->name('admin.gallery.store');
    Route::get('/admin/gallery/edit', [gallerya::class, 'redirectLegacyEdit'])->name('admin.gallery.legacy-edit');
    Route::get('/admin/gallery/{id}/edit', [gallerya::class, 'edit'])->whereNumber('id')->name('admin.gallery.edit');
    Route::put('/admin/gallery/{id}', [gallerya::class, 'update'])->whereNumber('id')->name('admin.gallery.update');
    Route::delete('/admin/gallery/{id}', [gallerya::class, 'destroy'])->whereNumber('id')->name('admin.gallery.destroy');
});

// authtication ka ye sabh

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:6,1')
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:6,1')
        ->name('login.store');

    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
        ->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->middleware('throttle:6,1')
        ->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])
        ->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('throttle:6,1')
        ->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
