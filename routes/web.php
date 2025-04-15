<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PinController;

// Combined Home Page with Scroll Sections
Route::get('/', [PinController::class, 'index'])->name('home');

// Contact Form Submission (AJAX)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Pin CRUD Routes
Route::post('/pin', [PinController::class, 'store'])->name('pin.store');
Route::delete('/pin/{id}', [PinController::class, 'destroy'])->name('pin.delete');
Route::put('/pin/{id}', [PinController::class, 'update'])->name('pin.update');

// Optional API (if needed)
Route::get('/api/pins', [PinController::class, 'index']);
