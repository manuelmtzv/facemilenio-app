<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    return view('landing');
  }
}
