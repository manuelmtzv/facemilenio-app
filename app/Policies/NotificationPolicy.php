<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
  use HandlesAuthorization;

  public function viewForUser(User $user, Notification $notification)
  {
    return $notification->user_id === $user->id;
  }

  public function viewForAdmin(User $user)
  {
    return $user->role_id === '2';
  }
}
