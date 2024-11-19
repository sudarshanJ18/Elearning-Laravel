<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\FirebaseAuthController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/uploads', [AdminController::class, 'uploads'])->name('admin.uploads');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/send-contact', [ContactController::class, 'sendContactForm'])->name('send.contact');

Route::post('/firebase-login', [FirebaseAuthController::class, 'loginWithFirebase']);
