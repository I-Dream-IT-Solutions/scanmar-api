<?php

namespace App\Http\Requests\CrewWorkExperience;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CrewWorkExperienceUpdateRequest extends FormRequest
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
         'pos_code' => 'required|max:255',
         'datefrom' => 'required|date',
         'dateto' => 'required|date',
         'nomonth' => 'required|numeric',
         'noyear' => 'required|numeric',
         'nodays' => 'required|numeric',
         'cause' => 'required|max:255',
         'vesname' => 'required|max:255',
         'aname' => 'required|max:255',
         'pname' => 'required|max:255',
         'groupx' => 'required|max:255',
       ];
     }

     protected function failedValidation(Validator $validator)
     {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
     }

     public function attributes()
     {
       return [
         'pos_code' => 'Position',
         'datefrom' => 'Date From',
         'dateto' => 'Date To',
         'nomonth' => 'No Of Month',
         'noyear' => 'No Of Year',
         'nodays' => 'No Of Days',
         'cause' => 'Cause',
         'vesname' => 'Vessel Name',
         'aname' => 'A Name',
         'pname' => 'P Name',
         'groupx' => 'Group',
       ];
     }
}
