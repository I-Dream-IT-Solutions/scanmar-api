<?php

namespace App\Http\Requests\Allottee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class AllotteeUpdateRequest extends FormRequest
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
         'lastName' => 'required|max:191',
         'firstName' => 'required|max:191',
         'middleName' => 'max:191',
         'relation' => 'required|max:191',
         'email' => 'required|max:191',
         'telno' => 'max:191',
         'address' => 'required|max:191',
         'zipcode' => 'required|max:191',
         'code' => 'required|max:191',
         'bbranch' => 'required|max:191',
         'acctType' => ['required','max:191',Rule::in(['SA', 'CA'])],
         'acctNo' => 'required|max:191',
         // 'callice' => ['required','max:191',Rule::in(['T', 'F'])],
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
         'relation' => 'Relation',
         'email' => 'Email',
         'telno' => 'Telephone Number',
         'address' => 'Address',
         'zipcode' => 'Zip Code',
         'code' => 'Code',
         'bbranch' => 'Bank Branch',
         'acctType' => 'Account Type',
         'acctNo' => 'Account Number',
         'callice' => 'Callice',
       ];
     }
}
