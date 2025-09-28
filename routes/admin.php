<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LogoController;
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

Route::get('logos',[LogoController::class,'index'])->name('logos.index')->middleware('auth');
// Route::resource('logos', LogoController::class)->middleware('auth');
Route::get('logo/create',[LogoController::class,'create'])->name('logos.create')->middleware('auth');
Route::post('logo/store',[LogoController::class,'store'])->name('logos.store')->middleware('auth');
Route::get('logo/edit', [LogoController::class, 'edit'])->name('logos.edit')->middleware('auth');
Route::post('logo/update', [LogoController::class, 'update'])->name('logos.update')->middleware('auth');
Route::delete('logos/{logo}', [LogoController::class, 'destroy'])->name('logos.destroy')->middleware('auth');

