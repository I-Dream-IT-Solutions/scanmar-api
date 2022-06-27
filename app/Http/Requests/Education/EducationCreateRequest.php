<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EducationCreateRequest extends FormRequest
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
      'level' => 'required|max:191',
      'school' => 'required|max:191',
      'school_address' => 'required|max:191',
      'course' => 'required|max:191',
      'yearfrom' => 'required|max:191',
      'yearto' => 'required|max:191',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json($validator->errors(), 422));
  }

  public function attributes()
  {
    return [
      'level' => 'Level',
      'school' => 'School',
      'school_address' => 'School Address',
      'course' => 'Course',
      'yearfrom' => 'Year From',
      'yearto' => 'Year To',
    ];
  }

}
