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

// Activity routes
Route::resource('activity', ActivityController::class);

// Friend routes
Route::resource('friend', FriendController::class);

// Notification routes
Route::resource('notification', NotificationController::class);

// Location
Route::post('/location', [LocationController::class, 'store'])->name('location.store');
