<?php

namespace App\Http\Requests\Test;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'status' => 'статус',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $statusFields = [
            'completed', 'developing'
        ];

        return [
            'name' => [
                'required', 'string', 'max:255'
            ],

            'status' => [
                'required', Rule::in($statusFields)
            ]
        ];
    }
}
