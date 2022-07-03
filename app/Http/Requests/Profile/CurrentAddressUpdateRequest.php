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
         'address_region_code' => 'max:255',
         'address_province_code' => 'required|max:255',
         'address_city_muni_code' => 'required|max:255',
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
         'address_region_code' => 'Region',
         'address_province_code' => 'Province',
         'address_city_muni_code' => 'City / Municipality',
       ];
     }
}
