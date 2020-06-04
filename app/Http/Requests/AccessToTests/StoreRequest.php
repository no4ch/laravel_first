<?php

namespace App\Http\Requests\AccessToTests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'group_id' => ['required', 'min:1', 'integer', 'exists:groups,id',],
            'test_id' => ['required', 'min:1', 'integer', 'exists:tests,id',],
        ];
    }
}
