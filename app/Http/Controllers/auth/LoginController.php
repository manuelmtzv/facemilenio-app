<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest');
  }

  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function login(LoginRequest $request, Redirector $redirect)
  {
    $credentials = $request->validated();

    $remember = $request->filled('remember');

    if (Auth::attempt($credentials, $remember)) {
      request()->session()->regenerate();

      // return Auth::user();
      return $redirect
        ->route('feed')
        ->with('status', 'You are logged in!');
    }

    throw ValidationException::withMessages([
      'email' => 'Auth failed. Try again later'
    ]);
  }
}
