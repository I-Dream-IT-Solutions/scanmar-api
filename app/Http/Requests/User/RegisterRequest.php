<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
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
      'email' => 'required|unique:system_user',
      'password' => 'required',
      'c_password' => 'required|same:password',
    ];
  }

  protected function failedValidation(Validator $validator)
  {

    $errors = $validator->errors()->toJson();
    $errors = json_decode($errors);
    $errorMessage = '';
    foreach($errors as $key =>$error){
      $errorMessage = $error;
    }
    throw new HttpResponseException(response()->json($errorMessage[0], 422));
  }

  public function attributes()
  {
    return [
      'new_password' => 'New Password',
      'c_password' => 'Confirm Password',
      'email' => 'Email'
    ];
  }

}
