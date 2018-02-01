<?php

namespace App\Http\Requests\Auth;

use Settings;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        if (Settings::get('terms_and_conditions_show')) {
            $rules['accept_terms'] = 'accepted';
        }

        return $rules;
    }

}
