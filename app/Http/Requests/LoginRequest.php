<?php
//done
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    const EMAIL = 'email';
    const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::EMAIL => [
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
        return  $this->get(self::EMAIL);

    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
