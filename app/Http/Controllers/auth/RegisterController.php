<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LocationController;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SaveLocationRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

// Models
use App\Models\Gender;
use App\Models\Country;
use App\Models\City;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest');
  }

  public function showRegistrationForm()
  {
    $genders = Gender::get();
    $countries = Country::get();
    $cities = City::get();

    return view('auth.register', compact('genders', 'countries', 'cities'));
  }

  public function register(RegisterRequest $request, SaveLocationRequest $saveLocationRequest, Redirector $redirect)
  {
    $values = $request->validated();

    // Gender
    $gender = Gender::where('name', $values['gender'])->firstOrFail();

    // Location
    $location = app(LocationController::class)->store($saveLocationRequest);

    // User
    $values['location_id'] = $location->id;
    $values['gender_id'] = $gender->id;

    // Hardcoded testing values (removing later)
    $values['username'] = 'default';
    $values['role_id'] = 1;

    $user = User::create(array_merge($values, [
      'password' => bcrypt($values['password'])
    ]));

    Auth::login($user);

    return $redirect
      ->route('feed')
      ->with('status', 'You are registered!');
  }
}
