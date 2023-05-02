<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationRequest extends FormRequest
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
      'notification_type_id' => ['required', 'numeric', 'exists:notification_types,id'],
      'user_id' => ['required', 'numeric', 'exists:users,id'],
      'content' => ['required', 'string']
    ];
  }
}
