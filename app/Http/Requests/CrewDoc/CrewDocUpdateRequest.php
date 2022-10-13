<?php

namespace App\Http\Requests\CrewDoc;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CrewDocUpdateRequest extends FormRequest
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
      'type'  =>'required|max:191',
      'name'  =>'required|max:191',
      'docno'  =>'required|max:191',
      'date_issue'  =>'required',
      'date_exp'  =>'nullable',
      'location'  =>'max:191',
      'school'  =>'max:191',
      'remarks'  =>'max:191',
      'filex.*'  =>['nullable','mimes:jpeg,jpg,png,pdf','max:10240'],
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json($validator->errors(), 422));
  }

  public function attributes()
  {
    return [
        'internal_Code'  => 'Internal Code',
        'crew_no'  => 'Crew Number',
        'type'  => 'Type',
        'code'  => 'Code',
        'typex'  => 'Typex',
        'codex'  => 'Codex',
        'name'  => 'Name',
        'docno'  => 'Document Number',
        'grade'  => 'Grade',
        'date_issue'  => 'Date Issue',
        'date_exp'  => 'Date Expiration',
        'period'  => 'Period',
        'location'  => 'Location',
        'school'  => 'School',
        'date_acept'  => 'Date Accept',
        'date_rec'  => 'Date Rec',
        'date_4ward'  => 'Date Forward',
        'remarks'  => 'Remarks',
        'vaxbrand'  =>'Vaccine Brand',
        'fullvax'  => 'Fully Vaccinated',
        'verified'  => 'Verified',
        'user_code'  => 'User Code',
        'pos_codex'  => 'Pos Codex',
        'submitted'  => 'Submitted',
        'subremarks'  => 'Sub Remarks',
        'crewfile'  => 'Crew File',
        'woexpiry'  => 'Woe Expiry',
        'filex'  => 'Filex',
        'created_by'  => 'Created By',
        'created_from'  => 'Created From',
        'status'  => 'Status',
    ];
  }

}
