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
         'lastName' => 'required|max:255',
         'firstName' => 'required|max:255',
         'middleName' => 'max:255',
         'address' => 'max:255',
         'relation' => 'max:255',
         'contact' => 'max:255',
       ];
     }

     protected function failedValidation(Validator $validator)
     {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
     }

     public function attributes()
     {
       return [
         'lastName' => 'Last Name',
         'firstName' => 'First Name',
         'middleName' => 'Middle Name',
         'address' => 'Address',
         'relation' => 'Relation',
         'contact' => 'Contact',
       ];
     }
}
