<?php

namespace App\Http\Requests\Api;

class FormSubnmissionSaveRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'string|min:5|required',
            'email' => 'email|min:5|required',
            'message' => 'string|min:5|required'
        ];
    }
}
