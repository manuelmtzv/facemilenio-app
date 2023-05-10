<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(string $id)
  {
    $user = User::find($id);
    $activities = $user->activities;

    return view('profile.index', compact('id', 'user', 'activities'));
  }
}
