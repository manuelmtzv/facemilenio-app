<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
    $userId = $this->route('id');

    dd($userId);

    return [
      'username' => ['required', 'string', 'unique:users,username,' . $userId],
      'name' => ['required', 'string'],
      'surname' => ['required', 'string'],
      'email' => ['required', 'email', 'unique:users,email,' . $userId],
      'gender_id' => ['required', 'string'],
      'birthdate' => ['required', 'date'],
      'url_profile' => ['nullable', 'url'],
      'location_id' => ['nullable', 'numeric', 'exists:locations,id'],
      'biography' => ['nullable', 'string'],
      'role_id' => ['required', 'numeric', 'exists:roles,id']
    ];
  }
}
