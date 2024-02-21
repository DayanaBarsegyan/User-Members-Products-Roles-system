<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbstractProductRequest extends FormRequest
{
    public const NAME = 'name';
    public const DESCRIPTION = 'description';
    public const CATEGORY = 'category';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
            ],
            self::DESCRIPTION => [
                'string',
            ],
            self::CATEGORY => [
                'required',
                'string',
            ],
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getDescription(): string
    {
        return $this->get(self::DESCRIPTION);
    }

    public function getCategory(): string
    {
        return $this->get(self::CATEGORY);
    }

    public function getParentId(): string
    {
        return auth()->id();
    }

}
