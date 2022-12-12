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
         'last_name' => 'required|max:191',
         'first_name' => 'required|max:191',
         'middle_name' => 'max:191',
         'relation' => 'max:191',
         'email' => 'max:191',
         'telno' => 'max:191',
         'address' => 'max:191',
         'zipcode' => 'max:191',
         'code' => 'required|max:191',
         'bbranch' => 'max:191',
         'acct_type' => ['required','max:191',Rule::in(['SA', 'CA'])],
         'acct_no' => 'required|max:191',
         'callice' => '',
         'dolact' => '',
       ];
     }

     protected function failedValidation(Validator $validator)
     {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
     }

     public function attributes()
     {
       return [
         'last_name' => 'Last Name',
         'first_name' => 'First Name',
         'middle_name' => 'Middle Name',
         'relation' => 'Relation',
         'email' => 'Email',
         'telno' => 'Telephone Number',
         'address' => 'Address',
         'zipcode' => 'Zip Code',
         'code' => 'Code',
         'bbranch' => 'Bank Branch',
         'acct_type' => 'Account Type',
         'acct_no' => 'Account Number',
         'callice' => 'Callice',
       ];
     }
}
