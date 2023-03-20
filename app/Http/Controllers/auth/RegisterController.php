<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

// Models
use App\Models\Gender;
use App\Models\Country;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  public function showRegistrationForm()
  {
    $genders = Gender::get();
    $countries = Country::get();
    $cities = City::get();

    return view('auth.register', compact('genders', 'countries', 'cities'));
  }

  public function register(Request $request)
  {
    $values = $request->validate([
      'name' => ['required', 'string'],
      'surname' => ['required', 'string'],
      'email' => ['required', 'email', 'unique:users'],
      'password' => ['required', 'string', Rules\Password::defaults()],
      'country' => ['required', 'string'],
      'city' => ['required', 'string'],
      'gender' => ['required', 'string'],
      'birthdate' => ['required', 'string'],
      'biography' => ['required', 'string'],
    ]);

    // Gender
    $gender = Gender::where('name', $values['gender'])->firstOrFail();

    // Location
    $location = app(LocationController::class)->store($request);

    // User
    $values['location_id'] = $location->id;
    $values['gender_id'] = $gender->id;

    // Hardcoded testing values (removing later)
    $values['username'] = 'default';
    $values['role_id'] = '1';

    $user = User::create(array_merge($values, [
      'password' => bcrypt($values['password'])
    ]));

    Auth::login($user);

    return response()->json($user);
  }
}
