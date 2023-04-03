<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Landing route
Route::get('/', LandingController::class)->name('landing');

// Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Logout route
Route::post('/logout', LogoutController::class)->name('logout');

// Feed route
Route::get('/feed', FeedController::class)->name('feed');

// - Database resources -

// Activities
Route::resource('activities', ActivityController::class);

// Cities
Route::resource('cities', CityController::class);

// Comments
Route::resource('comments', CommentController::class);

// Countries
Route::resource('countries', CountryController::class);

// Friends
Route::resource('friends', FriendController::class);

// Genders
Route::resource('genders', GenderController::class);

// Locations
Route::resource('locations', LocationController::class);

// Notifications
Route::resource('notifications', NotificationController::class);

// Notification-Types
Route::resource('notification-types', NotificationTypeController::class);

// Permissions
Route::resource('permissions', PermissionController::class);

// Roles
Route::resource('roles', RoleController::class);

// Role-Permissions
Route::resource('role-permissions', RolePermissionController::class);

// Users
Route::resource('users', UserController::class);
