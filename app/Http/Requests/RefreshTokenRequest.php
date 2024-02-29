<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefreshTokenRequest extends FormRequest
{
    public const TOKEN = 'token';

    public function rules(): array
    {
        return [
            self::TOKEN => [
                'required',
                'string',
            ],
        ];
    }

    public function getToken(): string
    {
        return $this->get(self::TOKEN);
    }
}
