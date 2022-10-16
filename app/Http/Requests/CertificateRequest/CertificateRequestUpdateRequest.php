<?php

namespace App\Http\Requests\CertificateRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CertificateRequestUpdateRequest extends FormRequest
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
            // 'crew_no'  => 'required|max:191',
            'certificate_type_id'  => 'required|max:191',
            // 'certificate_type_option'  => 'required|max:191',
            'remarks'  => 'max:191',
            // 'created_by'  => 'required|max:191',
            // 'created_date'  => 'required|max:191',
            // 'modified_by'  => 'required|max:191',
            // 'modified_date'  => 'required|max:191',
            // 'status'  => 'required|max:191',
          ];
     }

     protected function failedValidation(Validator $validator)
     {
       throw new HttpResponseException(response()->json($validator->errors(), 422));
     }

     public function attributes()
     {
        return [
            'certificate_type_id'  => 'Certificate',
            'certificate_type_option'  => 'Option',
            'remarks'  => 'Remarks',
          ];
     }
}
