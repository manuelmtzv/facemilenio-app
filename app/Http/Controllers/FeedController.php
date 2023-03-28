<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use App\Models\Activity;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FeedController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    // Getting the activities
    $activities = (Gate::allows('viewForAdmin', Auth::user()))
      ? Activity::all()
      : Auth::user()->activities;

    // Getting the notifications
    $notifications = (Gate::allows('viewForAdmin', Auth::user()))
      ? Notification::all()
      : Auth::user()->notifications;

    // Getting the friends relations
    $relations = (Gate::allows('viewForAdmin', Auth::user()))
      ? Friend::all()
      : Auth::user()->friends;


    $friends = collect();

    // Getting friend users
    foreach ($relations as $relation) {
      $friend = User::find($relation->friend_id);
      $friends->push($friend);
    }

    return view('feed.index', compact('activities', 'friends', 'notifications'));
  }
}
