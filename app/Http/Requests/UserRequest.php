<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    use FailedValidation;
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
            'name' => 'string|required',
            'login' => 'string|unique:users|required',
            'status' => 'string|required',
            'group' => 'string|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле name ы',
            'login.unique' => 'ccccc'
        ];
    }
}
