<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

// Landing route
Route::get('/', LandingController::class)->name('landing');

// Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Activities routes
Route::get('/feed ', [ActivityController::class, 'index'])->name('activity.index');


// Location
Route::post('/location', [LocationController::class, 'store'])->name('location.store');
