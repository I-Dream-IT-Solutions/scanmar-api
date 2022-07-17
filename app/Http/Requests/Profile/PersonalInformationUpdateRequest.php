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
         'photo' => 'nullable|max:2048|mimes:jpg,png',
         'firstName' => 'required|max:255',
         'middleName' => 'max:255',
         'lastName' => 'required|max:255',
         'group' => 'max:255',
         'gender' => 'required|max:255',
         'civilStatus' => 'required|max:255',
         'birthday' => 'required|date',
         'placeOfBirth' => 'required|max:255',
         'nationality' => 'required|max:255',
         'religion' => 'max:255',
         'height' => 'max:255',
         'weight' => 'max:255',
         'footSize' => 'max:255',
         'eyesColor' => 'max:255',
         'dismark' => 'max:255',
         'bloodType' => 'max:255',
         'waistline' => 'max:255',
         'parka' => 'max:255',
         'coverAll' => 'max:255',
         'foreignid' => 'max:255',
         'sss' => 'required|max:255',
         'tin' => 'required|max:255',
         'pagibig' => 'required|max:255',
         'phealth' => 'required|max:255',
         'recommendedBy' => 'max:255',
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
         'firstName' => 'First Name',
         'middleName' => 'Middle Name',
         'lastName' => 'Last Name',
         'gender' => 'Gender',
         'civilStatus' => 'Civil Status',
         'birthday' => 'Date Of Birth',
         'placeOfBirth' => 'Place Of Birth',
         'nationality' => 'Nationality',
         'religion' => 'Religion',
         'height' => 'Height',
         'weight' => 'Weight',
         'footSize' => 'Footsize',
         'eyesColor' => 'Eyes Color',
         'dismark' => 'Dismark',
         'bloodType' => 'Bloodtype',
         'waistline' => 'Waistline',
         'parka' => 'Parka',
         'coverAll' => 'Coverall',
         'foreignid' => 'Foreign ID',
         'sss' => 'SSS',
         'tin' => 'Tin',
         'pagibig' => 'Pag Ibig',
         'phealth' => 'Philhealth',
         'recommendedBy' => 'Recommended By',
         'relation' => 'Relation',
       ];
     }
}
