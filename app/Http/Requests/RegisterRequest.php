<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'name' => ['required', 'string'],
      'surname' => ['required', 'string'],
      'email' => ['required', 'email', 'unique:users'],
      'password' => ['required', 'string', Password::defaults()],
      'country' => ['required', 'string'],
      'city' => ['required', 'string'],
      'gender' => ['required', 'string'],
      'birthdate' => ['required', 'string'],
      'biography' => ['required', 'string'],
    ];
  }
}