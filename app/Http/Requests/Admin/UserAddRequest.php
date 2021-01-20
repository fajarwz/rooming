<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'email'             => 'required|string|min:3|max:100|unique:users,email',
            'username'          => 'required|string|min:3|max:20|unique:users,username',
            'password'          => 'required|string|min:3|max:20',
            'confirm_password'  => 'same:password',
            'name'              => 'required|string|max:20',
            'description'       => 'nullable|string|max:20',
        ];
    }
}
