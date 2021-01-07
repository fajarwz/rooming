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
            'description'       => 'nullable|string|max:100',
            'capacity'          => 'nullable|numeric|lt:100000',
            'photo'             => 'nullable|image|max:2048',
        ];
    }
}
