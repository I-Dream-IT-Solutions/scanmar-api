<?php

namespace App\Http\Requests\Dependent;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DependentCreateRequest extends FormRequest
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
      'name' => 'required|max:255',
      'relation' => 'required|max:255',
      'birthdate' => 'required|date',
      'address' => 'required|max:255',
      'contact_no' => 'required|max:255',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json($validator->errors(), 422));
  }

  public function attributes()
  {
    return [
      'name' => 'Name',
      'relation' => 'Relation',
      'birthdate' => 'Birthday',
      'address' => 'Address',
      'contact_no' => 'Contact No',
    ];
  }

}
