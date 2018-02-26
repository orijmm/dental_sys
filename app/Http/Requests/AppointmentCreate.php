<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentCreate extends FormRequest
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
            'num_consult_id' => 'required',
            'patient_id' => 'required',
            'specialist_id' => 'required',
            'elije' => 'required',
            'datetime'  => 'required',
            'status' => 'required',
        ];
    }
}
