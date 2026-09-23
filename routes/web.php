<?php

use App\Http\Controllers\admin\bloga;
use App\Http\Controllers\admin\contacts;
use App\Http\Controllers\admin\dashboard;
use App\Http\Controllers\admin\menue;
use App\Http\Controllers\admin\reservatiion;
use App\Http\Controllers\blog;
use App\Http\Controllers\contact;
use App\Http\Controllers\gallery;
use App\Http\Controllers\home;
use App\Http\Controllers\menu;
use App\Http\Controllers\reservation;
use Illuminate\Support\Facades\Route;

Route::get('/', [home::class, 'home'])->name('home');
Route::get('/table', [reservation::class, 'index'])->name('index');
Route::get('/menu', [menu::class, 'menu'])->name('menu');
Route::get('/blog', [blog::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [blog::class, 'show'])->name('blog.show');
Route::get('/contact', [contact::class, 'contact'])->name('contact');
Route::get('/gallery', [gallery::class, 'gallery'])->name('gallery');

Route::get('/admin/dashboard', [dashboard::class, 'dashboard'])->name('dashboard');

Route::get('/admin/reservatiion', [reservatiion::class, 'index'])->name('reservatiion');

Route::get('/admin/menue/create', [menue::class, 'index'])->name('menue.create');

Route::get('/admin/blogs', [bloga::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [bloga::class, 'create'])->name('admin.blogs.create');
Route::post('/admin/blogs', [bloga::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blogs/{id}/edit', [bloga::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{id}', [bloga::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{id}', [bloga::class, 'destroy'])->name('admin.blogs.destroy');

Route::get('/admin/contacts', [contacts::class, 'index'])->name('contacts');
// Route::get('/admin/contacts/index', [contacts::class, 'index'])->name('contacts.index');
