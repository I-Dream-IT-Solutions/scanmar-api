<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CurrentAddressUpdateRequest extends FormRequest
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
         'address' => 'required|max:255',
         'provinceCode' => 'required|max:255',
         'cityCode' => 'required|max:255',
         'barangayCode' => 'required|max:255',
       ];
     }

     protected function failedValidation(Validator $validator)
     {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
     }

     public function attributes()
     {
       return [
         'address' => 'Address',
         'provinceCode' => 'Province',
         'cityCode' => 'City',
         'barangayCode' => 'Barangay',
       ];
     }
}
