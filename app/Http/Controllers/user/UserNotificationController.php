<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class UserNotificationController extends Controller
{
  public function index()
  {
    $user = auth()->user();
    $notifications = $user->notifications;
    $pendingFriends = $user->pendingFriends;

    return view('user.notifications.index', compact('notifications', 'pendingFriends'));
  }
}
