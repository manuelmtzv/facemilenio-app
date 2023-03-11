<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

class AuthController extends Controller
{
  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function showRegistrationForm()
  {
    return view('auth.register');
  }

  public function register(Request $req)
  {
    $credentials = $req->validate($req, [
      'username' => 'required|unique:users|max:100',
      'name' => 'required|max:100',
      'surname' => 'required|max:100',
      'email' => 'required|unique:users|email|max:100',
      'password' => 'required|max:100|confirmed',
      'gender' => 'required|max:100',
      'birthdate' => 'required|date',
      'biography' => 'required',
      'country' => 'required',
      'city' => 'required',
    ]);

    // $location = Location::create([
    //   'city_id' => 
    // ]);

    $user = User::create([
      'name' => $req->name,
      'username' => $req->username,
      'email' => $req->email,
      'password' => $req->password
    ]);

    $token = JWTAuth::fromUser($user);

    return response()->json([
      'user' => $user,
      'token' => $token
    ]);
  }

  public function login(Request $req)
  {
  }

  public function logout()
  {
  }
}
