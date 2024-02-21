<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbstractRoleRequest extends FormRequest
{
    public const ROLE = 'role';

    public function rules(): array
    {
        return [
            self::ROLE => [
                'required',
                'string',
                'unique:roles'
            ],
        ];
    }

    public function getRole(): string
    {
        return $this->get(self::ROLE);
    }

    public function getParentId():int
    {
        return auth()->id();
    }
}
