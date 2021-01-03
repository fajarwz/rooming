<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'current_password'          => 'required|password',
            'new_password'              => 'required|string|min:3|max:20|different:current_password',
            'new_password_confirmation' => 'same:new_password',
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
            'current_password.required'         => 'Password Sekarang tidak boleh kosong',
            'current_password.password'         => 'Password salah',
            'new_password.required'             => 'Password Baru tidak boleh kosong',
            'new_password.string'               => 'Password Baru harus berupa string',
            'new_password.min'                  => 'Password Baru tidak boleh kurang dari 3 karakter',
            'new_password.max'                  => 'Password Baru tidak boleh lebih dari dari 20 karakter',
            'new_password.different'            => 'Password Baru tidak boleh sama dengan Password Sekarang',
            'new_password_confirmation.same'    => 'Konfirmasi Password Baru harus sama dengan Password Baru',
        ];
    }
}
