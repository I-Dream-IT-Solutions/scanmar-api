<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PersonalInformationUpdateRequest extends FormRequest
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
         'photo' => 'nullable,max:2048,mimes:jpg,png',
         'first_name' => 'required|max:255',
         'middle_name' => 'max:255',
         'last_name' => 'required|max:255',
         'gender' => 'required|max:255',
         'civil_status' => 'required|max:255',
         'date_of_birth' => 'required|date',
         'place_of_birth' => 'required|max:255',
         'nationality' => 'required|max:255',
         'religion' => 'max:255',
         'height' => 'max:255',
         'weight' => 'max:255',
         'footsize' => 'max:255',
         'eyes_color' => 'max:255',
         'dismark' => 'max:255',
         'bloodtype' => 'max:255',
         'waistline' => 'max:255',
         'parka' => 'max:255',
         'coverall' => 'max:255',
         'foreignid' => 'max:255',
         'sss' => 'required|max:255',
         'tin' => 'required|max:255',
         'pagibig' => 'required|max:255',
         'phealth' => 'required|max:255',
         'recommend' => 'max:255',
         'relation' => 'max:255',
       ];
     }

     protected function failedValidation(Validator $validator)
     {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
     }

     public function attributes()
     {
       return [
         'photo' => 'Photo',
         'first_name' => 'First Name',
         'middle_name' => 'Middle Name',
         'last_name' => 'Last Name',
         'gender' => 'Gender',
         'civil_status' => 'Civil Status',
         'date_of_birth' => 'Date Of Birth',
         'place_of_birth' => 'Place Of Birth',
         'nationality' => 'Nationality',
         'religion' => 'Religion',
         'height' => 'Height',
         'weight' => 'Weight',
         'footsize' => 'Footsize',
         'eyes_color' => 'Eyes Color',
         'dismark' => 'Dismark',
         'bloodtype' => 'Bloodtype',
         'waistline' => 'Waistline',
         'parka' => 'Parka',
         'coverall' => 'Coverall',
         'foreignid' => 'Foreign ID',
         'sss' => 'SSS',
         'tin' => 'Tin',
         'pagibig' => 'Pag Ibig',
         'phealth' => 'Philhealth',
         'recommend' => 'Recommended By',
         'relation' => 'Relation',
       ];
     }
}
