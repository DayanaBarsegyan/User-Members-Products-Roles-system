<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public const EMAIL = 'email';
    public const TOKEN = 'token';
    public const PASSWORD = 'password';


    public function rules(): array
    {
        return [
            self::EMAIL => [
                'required',
                'string',
                'email'
            ],
            self::TOKEN => [
                'required',
                'string',
            ],
            self::PASSWORD => [
                'required',
                'string',
            ],
        ];
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getToken(): string
    {
        return $this->get(self::TOKEN);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
