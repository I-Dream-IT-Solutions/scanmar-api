<?php

namespace App\Http\Requests\Schedule;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class ScheduleCreateRequest extends FormRequest
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
            'schedule_type'  => 'required|max:191',
            'document_type'  => 'required|max:191',
            'schedule_date'  => 'required|max:191',
            'schedule_time'  => 'required|max:191',
            'remarks'  =>  'required|max:191',
            'document'  => 'required|max:191',
          ];
    }
    protected function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    public function attributes()
    {
      return [
            'schedule_type'  => 'Schedule Type',
            'document_type'  => 'Document Type',
            'schedule_date'  => 'Schedule Date',
            'schedule_time'  => 'Schedule Time',
            'remarks'  =>  'Remarks',
            'document'  => 'Document',
            'status'  => 'Status',
      ];
    }

  }
