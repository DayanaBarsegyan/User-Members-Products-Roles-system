<?php

namespace App\Http\Requests\roles;

use App\Http\Requests\AbstractRoleRequest;

class UpdateRequest extends AbstractRoleRequest
{
    public const ID = 'id';

    public function rules(): array
    {
        return [
            self::ID => [
                'required',
                'integer',
            ],
        ];
    }

    public function getId(): string
    {
        return $this->get(self::ID);
    }
}
