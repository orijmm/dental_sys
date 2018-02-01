<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
        $id = $this->route('user');
        return [
            'email' => 'required|email|unique:users,email,' .$id,
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'status' => 'required',
            'role_id' => 'required|exists:roles,id'
        ];
    }
}
