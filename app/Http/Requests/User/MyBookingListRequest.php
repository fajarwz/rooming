<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class MyBookingListRequest extends FormRequest
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
            'room_id'           => 'required|integer|exists:rooms,id',
            'date'              => 'required|date_format:Y-m-d|before_or_equal:today',
            'start_time'        => 'required|date_format:H:i:s|before:end_time',
            'end_time'          => 'required|date_format:H:i:s|after:start_time',
            'purpose'           => 'required|string|max:100',
        ];
    }
}
