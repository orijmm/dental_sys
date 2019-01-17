<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdate extends FormRequest
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
        $id = $this->route('patient');
        return [
            'full_name' => 'required',
            'dni' => 'required|numeric|digits_between:6,9|unique:patients,dni,'.$id,
            'birthday' => 'required',
        ];
    }
}
