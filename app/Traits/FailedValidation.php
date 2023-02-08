<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FailedValidation
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => [
                'code' => 422,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ]
        ], 422));
    }
}
