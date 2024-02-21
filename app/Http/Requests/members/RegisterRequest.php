<?php

namespace App\Http\Requests\members;

use App\Http\Requests\AbstractMemberRequest;

class RegisterRequest extends AbstractMemberRequest
{
    public function rules(): array
    {
        return [
            self::EMAIL => [
                'required',
                'unique:users',
                'email',
                'string',
            ],
        ];
    }
}
