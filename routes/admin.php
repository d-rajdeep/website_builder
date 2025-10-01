<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Models\About;
use App\Models\Service;
use Illuminate\Support\Facades\Route;


// Login page
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.loginSubmit');

// Dashboard (protected)
Route::get('/dashboard', function () {
    return view('admin.dashboard'); // create this view
})->middleware('auth')->name('dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');


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

// Features
Route::get('features', [FeatureController::class,'index'])->name('features.index')->middleware('auth');
Route::get('features/create',[FeatureController::class,'create'])->name('features.create')->middleware('auth');
Route::post('features/store',[FeatureController::class,'store'])->name('features.store')->middleware('auth');
Route::get('features/edit', [FeatureController::class, 'edit'])->name('features.edit')->middleware('auth');
Route::put('/features/update-all', [FeatureController::class, 'updateAll'])->name('features.updateAll')->middleware('auth');
Route::delete('features/{logo}', [FeatureController::class, 'destroy'])->name('features.destroy')->middleware('auth');

// About
Route::get('about', [AboutController::class,'index'])->name('about.index')->middleware('auth');
Route::get('about/create',[AboutController::class,'create'])->name('about.create')->middleware('auth');
Route::post('about/store',[AboutController::class,'store'])->name('about.store')->middleware('auth');
Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit')->middleware('auth');
Route::put('about/update', [AboutController::class, 'update'])->name('about.update')->middleware('auth');
Route::delete('about/{logo}', [AboutController::class, 'destroy'])->name('about.destroy')->middleware('auth');

// Services Routes
Route::get('services', [ServiceController::class,'index'])->name('services.index')->middleware('auth');
Route::get('services/create',[ServiceController::class,'create'])->name('services.create')->middleware('auth');
Route::post('services/store',[ServiceController::class,'store'])->name('services.store')->middleware('auth');
Route::get('services/edit/{id}', [ServiceController::class, 'edit'])->name('services.edit')->middleware('auth');
Route::put('/services/update-all/{id}', [ServiceController::class, 'updateAll'])->name('services.updateAll')->middleware('auth');
Route::delete('services/{logo}', [ServiceController::class, 'destroy'])->name('services.destroy')->middleware('auth');

// Portfolios
Route::get('portfolios', [PortfolioController::class,'index'])->name('portfolios.index')->middleware('auth');
Route::get('portfolios/create',[PortfolioController::class,'create'])->name('portfolios.create')->middleware('auth');
Route::post('portfolios/store',[PortfolioController::class,'store'])->name('portfolios.store')->middleware('auth');
Route::get('portfolios/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolios.edit')->middleware('auth');
Route::put('portfolios/update/{id}', [PortfolioController::class, 'update'])->name('portfolios.update')->middleware('auth');
Route::delete('portfolios/{logo}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy')->middleware('auth');

// Testimonial
Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index')->middleware('auth');
Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create')->middleware('auth');
Route::post('testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store')->middleware('auth');
Route::get('testimonials/edit/{testimonial}', [TestimonialController::class, 'edit'])->name('testimonials.edit')->middleware('auth');
Route::put('testimonials/update/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update')->middleware('auth');
Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy')->middleware('auth');
