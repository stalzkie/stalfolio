<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\PinController;
use Illuminate\Support\Facades\Route;
use App\Models\Pin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;

// ----------------------
// Landing Page (Public)
// ----------------------
Route::get('/', function () {
    $pins = Pin::all();  // Pass pins for landing page display
    return view('landing-page', compact('pins'));
})->name('landing');

// ----------------------
// Home (Authenticated)
// ----------------------
Route::get('/home', [PinController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

// ----------------------
// Google OAuth
// ----------------------
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// ----------------------
// Authenticated User Routes
// ----------------------
Route::middleware('auth')->group(function () {
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pin CRUD (handled via PinController)
    Route::post('/pins', [PinController::class, 'store'])->name('pin.store');
    Route::put('/pins/{pin}', [PinController::class, 'update'])->name('pin.update');
    Route::delete('/pins/{pin}', [PinController::class, 'destroy'])->name('pin.delete');
});

// ----------------------
// Logout (Manual for Google Flow)
// ----------------------
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// -------------------
// Contacts
// -------------------
Route::middleware('auth')->post('/contact-submit', [ContactController::class, 'store'])->name('contact.submit');