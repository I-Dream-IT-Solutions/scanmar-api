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
         'datefrom' => 'required',
         'dateto' => 'required',
         // 'nomonth' => 'required|numeric',
         // 'noyear' => 'required|numeric',
         // 'nodays' => 'required|numeric',
         'causecode' => 'required|max:255',
         'vescode' => 'required|max:255',
         'acode' => 'required|max:255',
         'pcode' => 'required|max:255',

         'typecode' => 'required|max:255',
         'route' => 'required|max:255',
         'enginecode' => 'required|max:255',
         'flag' => 'required|max:255',
         'grt' => 'max:50',
         'bhp' => 'max:50',
         'nrt' => 'max:50',
         'kw' => 'max:50',
         // 'groupx' => 'required|max:255',
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
         'causecode' => 'Cause',
         'vescode' => 'Vessel Name',
         'acode' => 'Agency Name',
         'pcode' => 'Principal Name',
         'groupx' => 'Group',
       ];
     }
}
