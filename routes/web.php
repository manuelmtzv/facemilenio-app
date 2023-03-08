<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Landing route
Route::get('/', LandingController::class);

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm']);
