<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $code
 */
class ApiSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * todo: maybe we should extend the code validation to check the format more strictly
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => [
                'string',
                'required',
                'min:14',
                'max:16',
                'regex:/^[0-9]{2}:[0-9]{2}:[0-9]{5,7}:[0-9]{2,4}+$/i'
            ],
        ];
    }
}
