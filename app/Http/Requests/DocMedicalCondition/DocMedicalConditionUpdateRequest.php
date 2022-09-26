<?php

namespace App\Http\Requests\DocMedicalCondition;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DocMedicalConditionUpdateRequest extends FormRequest
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
        'crew_no'  => 'required|max:191',
        'doccode'  => 'required|max:191',
        'date_issue'  => 'required|max:191',
        'medical_condition_id'  => 'required|max:191',
        'other_description'  => 'required|max:191',
        'remarks'  => 'required|max:191',
        'mod_date'  => 'required|max:191',
        'mod_by'  => 'required|max:191',
        ];
    }
  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json($validator->errors(), 422));
  }

  public function attributes()
  {
    return [
      'crew_no'  => 'Crew Number',
      'doccode'  => 'Document Code',
      'date_issue'  => 'Date Issue',
      'medical_condition_id	'  => 'Medical Condition ID',
      'other_description'  => 'Other Description',
      'remarks'  => 'Remarks',
      'mod_date'  => 'Modified Date',
      'mod_by'  => 'Modified By',
    ];
  }

}
