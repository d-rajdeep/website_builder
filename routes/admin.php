<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

// Login page
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.loginSubmit');

// Dashboard (protected)
Route::get('/dashboard', function () {
    return view('admin.dashboard'); // create this view
})->middleware('auth')->name('dashboard');

// Logout
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
