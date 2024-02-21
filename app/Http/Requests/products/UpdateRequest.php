<?php

namespace App\Http\Requests\products;

use App\Http\Requests\AbstractProductRequest;

class UpdateRequest extends AbstractProductRequest
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
