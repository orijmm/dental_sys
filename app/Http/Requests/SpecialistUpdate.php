<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialistUpdate extends FormRequest
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
        $id = $this->route('specialist');
        return [
            'specialty_id' => 'required',
            'name' => 'required',
            'last_name'  => 'required',
            'email' => 'required|email',
            'dni' => 'required|numeric|unique:specialists,dni,'.$id,
            'status' => 'required',
        ];
    }
}
