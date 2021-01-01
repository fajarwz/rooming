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
            'username'          => 'required|string|min:3|max:20|unique:users,username',
            'password'          => 'required|string|min:3|max:20',
            'confirm_password'  => 'same:password',
            'name'              => 'required|string|max:20',
            'description'       => 'nullable|string|max:20',
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
            'username.required'     => 'Username tidak boleh kosong',
            'username.string'       => 'Username harus berupa string',
            'username.min'          => 'Username tidak boleh kurang dari 3 karakter',
            'username.max'          => 'Username tidak boleh lebih dari 20 karakter',
            'username.unique'       => 'Username tidak tersedia',
            'password.required'     => 'Password tidak boleh kosong',
            'password.string'       => 'Password harus berupa string',
            'password.min'          => 'Password tidak boleh kurang dari 3 karakter',
            'password.max'          => 'Password tidak boleh lebih dari 20 karakter',
            'confirm_password.same' => 'Confirm Password harus sama dengan Password',
            'name.required'         => 'Nama tidak boleh kosong',
            'name.string'           => 'Nama harus berupa string',
            'name.max'              => 'Nama tidak boleh lebih dari 20 karakter',
            'description.max'       => 'Deskripsi tidak boleh lebih dari 20 karakter',
            'description.string'    => 'Deskripsi harus berupa string',
        ];
    }
}
