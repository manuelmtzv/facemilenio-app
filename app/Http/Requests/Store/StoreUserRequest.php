<?php

namespace App\Http\Requests\Store;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
      'username' => ['required', 'string', 'unique:users'],
      'name' => ['required', 'string'],
      'surname' => ['required', 'string'],
      'email' => ['required', 'email', 'unique:users'],
      'password' => ['required', 'string', Password::defaults()],
      'gender_id' => ['required', 'string'],
      'birthdate' => ['required', 'date'],
      'url_profile' => ['nullable', 'url'],
      'location_id' => ['nullable', 'numeric', 'exists:locations,id'],
      'biography' => ['nullable', 'string'],
      'role_id' => ['required', 'numeric', 'exists:roles,id']
    ];
  }
}
