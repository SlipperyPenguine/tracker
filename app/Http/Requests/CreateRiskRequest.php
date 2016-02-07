<?php

namespace tracker\Http\Requests;

use tracker\Http\Requests\Request;

class CreateRiskRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required',
            'owner' => 'required|min:1'
        ];
    }
}
