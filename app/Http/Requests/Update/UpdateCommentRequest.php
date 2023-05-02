<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    // return auth()->user()->role->name === "Admin";
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
      'user_id' => ['required', 'numeric', 'exists:users,id'],
      'activity_id' => ['required', 'numeric', 'exists:activities,id'],
      'content' => ['required', 'string']
    ];
  }
}
