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
            'username.min'          => 'Username tidak boleh kurang dari :min karakter',
            'username.max'          => 'Username tidak boleh lebih dari :max karakter',
            'username.unique'       => 'Username tidak tersedia',
            'password.required'     => 'Password tidak boleh kosong',
            'password.min'          => 'Password tidak boleh kurang dari :min karakter',
            'password.max'          => 'Password tidak boleh lebih dari :max karakter',
            'confirm_password.same' => 'Confirm Password harus sama dengan Password',
            'name.required'         => 'Nama tidak boleh kosong',
            'name.max'              => 'Nama tidak boleh lebih dari :max karakter',
            'description.max'       => 'Deskripsi tidak boleh lebih dari :max karakter',
        ];
    }
}
