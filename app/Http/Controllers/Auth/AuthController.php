<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

class AuthController extends Controller
{
  public function register(Request $req)
  {
    $this->validate($req, [
      'username' => 'required|unique:users|max:100',
      'email' => 'required|unique:users|email|max:100',
      'password' => 'required|max:100|confirmed',
      'name' => 'required|max:100',
      // 'surname' => 'required|max:100',
      // 'gender' => 'required|max:100',
      // 'birthdate' => 'required|date',
      // 'biography' => 'required'
    ]);

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

  public function logout(Request $req)
  {
  }
}
