<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFriendController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke()
  {
    return view('user.friends.index');
  }
}
