<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

// Contact form submission (this should match your form action)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
