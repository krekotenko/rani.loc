<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationFreeRequest extends FormRequest
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
            'firstname' => 'required|string',
            'surname' => 'required|string',
            'dob' => 'required|date|date_format:m/d/Y',
            'date_free_session' => 'required|date|date_format:d.m.Y H:i:s',
            //'date_of_last_check' => 'sometimes|date|date_format:m/d/Y',
            'phone' => 'required|string',
            'email' => 'required|string',
            'occupation' => 'required|string',
            'mental_conditions' => 'required|string',
            'city' => 'string',
        ];
    }
}
