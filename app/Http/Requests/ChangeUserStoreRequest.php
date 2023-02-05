<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeUserStoreRequest extends FormRequest
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
            'change' => 'array|required',
            'change.id' => 'integer|required',
            'users' => 'array|required',
            'users.*.name' => 'string|required',
            'users.*.login' => 'string|required',
            'users.*.status' => 'string|required',
            'users.*.group' => 'string|required'
        ];
    }
}
