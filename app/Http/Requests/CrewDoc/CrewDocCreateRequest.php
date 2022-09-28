<?php

namespace App\Http\Requests\CrewDoc;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CrewDocCreateRequest extends FormRequest
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
      'date_issue'  =>'required|date',
      'date_exp'  =>'nullable|date',
      'location'  =>'max:191',
      'school'  =>'max:191',
      'remarks'  =>'max:191',
      'crewfile'  =>'required',


      // 'internal_Code'  => 'max:191',
      // 'crew_no'  => 'max:191',
      // 'type'  => 'max:191',
      // 'code'  => 'max:191',
      // 'typex'  => 'max:191',
      // 'codex'  => 'max:191',
      // 'name'  => 'max:191',
      // 'docno'  => 'max:191',
      // 'grade'  => 'max:191',
      // 'date_issue'  => 'max:191',
      // 'date_exp'  => 'max:191',
      // 'period'  => 'max:191',
      // 'location'  => 'max:191',
      // 'school'  => 'max:191',
      // 'date_acept'  => 'required|max:191',
      // 'date_rec'  => 'required|max:191',
      // 'date_4ward'  => 'required|max:191',
      // 'remarks'  => 'max:191',
      // 'vaxbrand'  =>'required|max:191',
      // 'fullvax'  => 'required|max:191',
      // 'verified'  => 'required|max:191',
      // 'user_code'  => 'required|max:191',
      // 'pos_codex'  => 'required|max:191',
      // 'submitted'  => 'required|max:191',
      // 'subremarks'  => 'required|max:191',
      // 'crewfile'  => 'required|max:191',
      // 'woexpiry'  => 'max:191',
      // 'filex'  => 'max:191',
      // 'created_by'  => 'required|max:191',
      // 'created_from'  => 'required|max:191',
      // 'is_deleted'  => 'required|max:191',
      // 'deleted_by'  => 'required|max:191',
      // 'delete_reason'  => 'required|max:191',
      // 'metadata'  => 'required|max:191',
      // 'tmp_filex'  => 'required|max:191',
      // 'last_update'  => 'required|max:191',
      // 'status'  => 'required|max:191',

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
