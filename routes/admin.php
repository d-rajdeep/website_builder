<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SliderController;
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

// Logo
Route::get('logos', [LogoController::class,'index'])->name('logos.index')->middleware('auth');
Route::get('logo/create',[LogoController::class,'create'])->name('logos.create')->middleware('auth');
Route::post('logo/store',[LogoController::class,'store'])->name('logos.store')->middleware('auth');
Route::get('logo/edit', [LogoController::class, 'edit'])->name('logos.edit')->middleware('auth');
Route::post('logo/update', [LogoController::class, 'update'])->name('logos.update')->middleware('auth');
Route::delete('logos/{logo}', [LogoController::class, 'destroy'])->name('logos.destroy')->middleware('auth');

// Sliders
Route::get('sliders', [SliderController::class,'index'])->name('sliders.index')->middleware('auth');
Route::get('slider/create',[SliderController::class,'create'])->name('sliders.create')->middleware('auth');
Route::post('slider/store',[SliderController::class,'store'])->name('sliders.store')->middleware('auth');
Route::get('slider/edit', [SliderController::class, 'edit'])->name('sliders.edit')->middleware('auth');
Route::put('slider/update', [SliderController::class, 'update'])->name('sliders.update')->middleware('auth');
Route::delete('sliders/{logo}', [SliderController::class, 'destroy'])->name('sliders.destroy')->middleware('auth');
