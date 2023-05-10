<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserFriendController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke()
  {
    // $users = User::whereHas('role', function ($query) {
    //   $query->where('name', 'User');
    // })->get();

    $users = User::whereHas('role', function ($query) {
      $query->where('name', 'User');
    })->where('id', '<>', auth()->user()->id)->get();

    return view('user.friends.index', compact('users'));
  }
}
