<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecoverPasswordRequest extends FormRequest
{
    public const EMAIL = 'email';

    public function rules(): array
    {
        return [
            self::EMAIL => [
                'required',
                'string',
            ],
        ];
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }
}
