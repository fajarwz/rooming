<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name'              => 'sometimes|required|string|max:100|unique:rooms,name,NULL,id,deleted_at,NULL',
            'description'       => 'nullable|string|max:255',
            'capacity'          => 'nullable|numeric|lt:100000',
            'photo'             => 'nullable|image|max:2048',
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
            'name.required'         => 'Nama tidak boleh kosong',
            'name.string'           => 'Nama harus berupa string',
            'name.max'              => 'Nama tidak boleh lebih dari 100 karakter',
            'name.unique'           => 'Nama tidak tersedia',
            'description.string'    => 'Deskripsi harus berupa string',
            'description.max'       => 'Deskripsi tidak boleh lebih dari 255 karakter',
            'capacity.numeric'      => 'Kapasitas harus numerik',
            'capacity.lt'           => 'Kapasitas tidak boleh lebih dari 100000',
            'photo.image'           => 'Foto harus berupa gambar',
            'photo.max'             => 'Ukuran Foto tidak boleh lebih dari 2048MB',
        ];
    }
}
