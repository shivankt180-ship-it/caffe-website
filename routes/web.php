<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\reservation;
use App\Http\Controllers\menu;
use App\Http\Controllers\blog;
use App\Http\Controllers\contact;
use App\Http\Controllers\gallery;





use App\Http\Controllers\admin\dashboard;
use App\Http\Controllers\admin\reservatiion;
use App\Http\Controllers\admin\menue;
use App\Http\Controllers\admin\bloga;
use App\Http\Controllers\admin\contacts;





Route::get('/', [home::class, 'home'])->name('home');
Route::get('/table', [reservation::class, 'index'])->name('index');
Route::get('/menu', [menu::class, 'menu'])->name('menu');
Route::get('/blog', [blog::class, 'blog'])->name('blog');
Route::get('/contact', [contact::class, 'contact'])->name('contact');
Route::get('/gallery', [gallery::class, 'gallery'])->name('gallery');








Route::get('/admin/dashboard', [dashboard::class, 'dashboard'])->name('dashboard');

Route::get('/admin/reservatiion', [reservatiion::class, 'index'])->name('reservatiion');

Route::get('/admin/menue/create', [menue::class, 'index'])->name('menue.create');

Route::get('/admin/bloga/create', [bloga::class, 'index'])->name('bloga.create');

Route::get('/admin/contacts', [contacts::class, 'index'])->name('contacts');
// Route::get('/admin/contacts/index', [contacts::class, 'index'])->name('contacts.index');





