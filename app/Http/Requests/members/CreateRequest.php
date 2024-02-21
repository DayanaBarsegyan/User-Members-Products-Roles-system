<?php

namespace App\Http\Requests\members;

use App\Http\Requests\AbstractMemberRequest;

class CreateRequest extends AbstractMemberRequest
{
    public const ROLE = 'role';

    public function rules(): array
    {
        return [
            self::ROLE => [
                'required',
                'string'
            ]
        ];
    }

    public function getRole(): string
    {
        return $this->get(self::ROLE);
    }
}
