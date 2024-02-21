<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbstractMemberRequest extends FormRequest
{
    public const USERNAME = 'username';
    public const GENDER = 'gender';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::USERNAME => [
                'required',
                'string',
            ],
            self::GENDER => [
                'required',
                'string',
            ],
            self::EMAIL => [
                'required',
                'unique:members',
                'email',
                'string',
            ],
            self::PASSWORD => [
                'required',
                'string',
            ],
        ];
    }

    public function getUserName(): string
    {
        return $this->get(self::USERNAME);
    }

    public function getGender(): string
    {
        return $this->get(self::GENDER);
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }


    public function getParentId():int
    {
        return auth()->id();
    }
}
