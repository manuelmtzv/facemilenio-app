<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

// Landing route
Route::get('/', LandingController::class)->name('landing');

// Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Feed route
Route::get('/feed', FeedController::class)->name('feed');

// // Activity routes
// Route::resource('activities', ActivityController::class);

// // Friend routes
// Route::resource('friends', FriendController::class);

// // Notification routes
// Route::resource('notifications', NotificationController::class);

// // Location
// Route::post('/locations', [LocationController::class, 'store'])->name('location.store');
