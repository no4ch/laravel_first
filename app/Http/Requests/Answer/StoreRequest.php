<?php

namespace App\Http\Requests\Answer;

use Illuminate\Validation\Rule;
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
    $statusFields = [
      'true', 'false'
    ];

    return [
      'answer' => [
        'required', 'max:255'
      ],

      'status' => [
        'required', Rule::in([
          'true', 'false'
        ])
      ]
    ];
  }
}
