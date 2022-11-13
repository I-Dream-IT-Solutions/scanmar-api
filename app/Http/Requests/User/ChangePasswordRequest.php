<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ChangePasswordRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize()
  {
    return true;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules()
  {
    return [
      'current_password' => 'required|max:191',
      'new_password' => 'required|max:191',
      'confirm_password' => 'required|max:191|same:new_password',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json($validator->errors(), 422));
  }

  public function attributes()
  {
    return [
      'new_password' => 'New Password',
      'confirm_password' => 'Confirm Password',
      'current_password' => 'Current Password'
    ];
  }

}
