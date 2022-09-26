<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DocumentUpdateRequest extends FormRequest
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
        'crew_profile_id' => 'required|max:191',
        'document_id' => 'required|max:191',
        'issued_date' => 'required|max:191',
        'expiration_date' => 'required|max:191',
        'created_date' => 'required|max:191',
        'created_by' => 'required|max:191',
        'modified_date' => 'required|max:191',
        'modified_by' => 'required|max:191',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json($validator->errors(), 422));
  }

  public function attributes()
  {
    return [
        'crew_profile_id' => 'Profile ID',
        'document_id' => 'Document ID',
        'issued_date' => 'Issued Date',
        'expiration_date' => 'Expiration Date',
        'created_date' => 'Created Date',
        'created_by' => 'Created By',
        'modified_date' => 'Modified Date',
        'modified_by' => 'Modified By',
    ];
  }

}
