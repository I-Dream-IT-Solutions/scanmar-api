<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EmergencyContactUpdateRequest extends FormRequest
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
         'emerlname' => 'required|max:255',
         'emerfname' => 'required|max:255',
         'emermname' => 'max:255',
         'emeradd' => 'max:255',
         'emerrelat' => 'max:255',
         'emertel' => 'max:255',
       ];
     }

     protected function failedValidation(Validator $validator)
     {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
     }

     public function attributes()
     {
       return [
         'emerlname' => 'Last Name',
         'emerfname' => 'First Name',
         'emermname' => 'Middle Name',
         'emeradd' => 'Address',
         'emerrelat' => 'Relation',
         'emertel' => 'Telephone',
       ];
     }
}
