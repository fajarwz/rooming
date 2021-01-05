<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use Carbon\Carbon;

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
        $rules = [
            'room_id'           => 'required|integer|exists:rooms,id',
            'date'              => 'required|date_format:Y-m-d|after_or_equal:today',
            'end_time'          => 'required|date_format:H:i|after:start_time',
            'purpose'           => 'required|string|max:100',
        ];

        $today = Carbon::now()->toDateString();
        $now = Carbon::now()->format('H:i');

        if ($this->input('date') == $today) {
            $rules['start_time'] = 'required|date_format:H:i|before:end_time|after:'.$now;
        } else {
            $rules['start_time'] = 'required|date_format:H:i|before:end_time';
        }

        return $rules;
    }
}
