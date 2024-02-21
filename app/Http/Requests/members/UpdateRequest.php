<?php

namespace App\Http\Requests\members;

use App\Http\Requests\AbstractMemberRequest;

class UpdateRequest extends AbstractMemberRequest
{
    public const ROLE = 'role';
    public const ID = 'id';

    public function rules(): array
    {
        return [
            self::ID => [
                'required',
                'integer',
            ],
            self::ROLE => [
                'required',
                'string'
            ]
        ];
    }

    public function getId(): string
    {
        return $this->get(self::ID);
    }

    public function getRole(): string
    {
        return $this->get(self::ROLE);
    }
}
