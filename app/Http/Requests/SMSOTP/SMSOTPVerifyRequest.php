<?php

namespace App\Http\Requests\SMSOTP;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SMSOTPVerifyRequest extends FormRequest
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
         'phone_number' => 'required|max:255',
         'code' => 'required|max:255',
       ];
     }

     protected function failedValidation(Validator $validator)
     {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
     }

     public function attributes()
     {
       return [
         'Phone Number' => 'phone_number',
         'Code' => 'code',
       ];
     }
}
