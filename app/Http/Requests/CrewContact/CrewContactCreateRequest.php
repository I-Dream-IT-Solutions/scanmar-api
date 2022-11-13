<?php

namespace App\Http\Requests\CrewContact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CrewContactCreateRequest extends FormRequest
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
      'label'  => 'required|max:191',
      'description'  => 'required|max:191',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json($validator->errors(), 422));
  }

  public function attributes()
  {
    return [
        'label'  => 'Label',
        'description'  => 'Description',
    ];
  }

}
