<?php

namespace App\Http\Requests\User;

use Auth;
use Hash;
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();

        return [
            'name' => [
                'required', 'string', 'max:255'
            ],

            'email' => [
                'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),
            ],

            'old-password' => [
                'nullable', 'string', 'max:255', 'min:8',
            ],

            'new-password' => [
                'nullable', 'string', 'max:255', 'min:8', 'same:confirm-new-password', 'different:old-password'
            ],

            'confirm-new-password' => [
                'nullable', 'string', 'max:255', 'min:8', 'same:new-password'
            ],
        ];
    }
}
