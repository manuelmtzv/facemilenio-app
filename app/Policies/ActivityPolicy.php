<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
  use HandlesAuthorization;

  public function viewForUser(User $user, Activity $activity)
  {
    return $activity->user_id === $user->id;
  }

  public function viewForAdmin(User $user)
  {
    return $user->role_id === '2';
  }
}
