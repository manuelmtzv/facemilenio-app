<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\NotificationController;

class FeedController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    $notifications = app(NotificationController::class)->index();
    $friends = app(FriendController::class)->index();
    $activities = app(ActivityController::class)->index();

    return view('feed.index', compact('notifications', 'friends', 'activities'));
  }
}
