<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\user\FriendshipController;
use App\Http\Controllers\user\UserFriendController;
use App\Http\Controllers\NotificationTypeController;
use App\Http\Controllers\user\UserCommentController;
use App\Http\Controllers\user\UserProfileController;
use App\Http\Controllers\user\UserActivityController;
use App\Http\Controllers\user\UserNotificationController;

// Routes for guests users
Route::middleware(['guest'])->group(function () {
  // Landing route
  Route::get('/', LandingController::class)->name('landing');

  // - Auth process routes - 

  // Signup routes
  Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
  Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

  // Login routes
  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

// General authenticated routes
Route::middleware(['auth'])->group(function () {
  // Logout route
  Route::post('/logout', LogoutController::class)->name('logout');

  // Feed route
  Route::get('/feed', FeedController::class)->name('feed');

  // Profile route
  Route::get('/profile/{id}', UserProfileController::class)->name('profile');
});

// Routes for authenticated users
Route::middleware(['user'])->group(function () {
  Route::prefix('user')->group(function () {
    // - Database resources -

    // Activities
    Route::resource('activities', UserActivityController::class)->names('user.activities');

    // Comments
    Route::resource('comments', UserCommentController::class)->names('user.comments');

    // Friends
    Route::get('/friends', UserFriendController::class)->name('user.friends');

    // Notifications
    Route::get('notifications', [UserNotificationController::class, 'index'])->name('user.notifications.index');

    // - Friendship -

    // Send
    Route::post('/profile/{user}', [FriendshipController::class, 'sendRequest'])->name('user.friendship');

    // Accept
    Route::patch('/notifications/{friend}', [FriendshipController::class, 'acceptRequest'])->name('user.friendship.accept');

    // Decline 
    Route::delete('/notifications/{friend}', [FriendshipController::class, 'declineRequest'])->name('user.friendship.decline');
  });
});

// Routes for authenticated admins
Route::middleware(['admin'])->group(function () {
  Route::prefix('admin')->group(function () {
    // - Database resources -

    // Activities
    Route::resource('activities', ActivityController::class);

    // Comments
    Route::resource('comments', CommentController::class);

    // Cities
    Route::resource('cities', CityController::class);

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
  });
});
