<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Auth\Access\HandlesAuthorization;

class FriendPolicy
{
  use HandlesAuthorization;

  public function viewForUser(User $user, Friend $friend)
  {
    return $friend->user_id === $user->id;
  }

  public function viewForAdmin(User $user)
  {
    return $user->role_id === '2';
  }
}
