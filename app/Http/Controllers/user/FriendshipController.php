<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendshipController extends Controller
{
  public function sendRequest(Request $request, User $user)
  {
    Friend::create([
      'user_id' => auth()->user()->id,
      'friend_id' => $user->id,
      'is_requested' => true,
      'is_accepted' => false,
    ]);

    // Redirect back to the user's profile page
    return redirect()->route('profile', $user->id);
  }

  public function acceptRequest(Request $request, Friend $friend)
  {
    $user = auth()->user();

    // Check that the authenticated user is the friend recipient
    if ($friend->friend_id !== $user->id) {
      abort(403);
    }

    $friend->update([
      'is_accepted' => true,
    ]);

    // Redirect back to the user's profile page
    return redirect()->route('user.friends');
  }

  public function declineRequest(Request $request, Friend $friend)
  {
    $user = auth()->user();

    // Check that the authenticated user is the friend recipient
    if ($friend->friend_id !== $user->id) {
      abort(403);
    }

    // Delete the friend instance
    $friend->delete();

    // Redirect back to the user's profile page
    return redirect()->route('user.friends');
  }
}
