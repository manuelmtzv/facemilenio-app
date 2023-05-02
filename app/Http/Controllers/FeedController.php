<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;

class FeedController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    $activities = Activity::with('user:id,username')->get();

    return view('feed.index', compact('activities'));
  }
}
