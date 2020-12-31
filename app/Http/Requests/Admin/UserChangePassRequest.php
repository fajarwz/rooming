<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserChangePassRequest extends FormRequest
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
            'password'          => 'required|string|min:3|max:20',
            'confirm_password'  => 'same:password',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.required'         => 'Password Baru tidak boleh kosong',
            'password.min'              => 'Password Baru tidak boleh kurang dari 3 karakter',
            'password.max'              => 'Password Baru tidak boleh lebih dari 20 karakter',
            'confirm_password.same'     => 'Confirm Password Baru harus sama dengan Password Baru',
        ];
    }
}
