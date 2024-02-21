<?php

namespace App\Services\DTO\products;

use App\Http\Requests\products\CreateRequest;

class CreateRequestDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public string $category,
        public int $parentId
    ){}

    public static function fromRequest(CreateRequest $request): CreateRequestDTO
    {
        return new self(
            name: $request->getName(),
            description: $request->getDescription(),
            category: $request->getCategory(),
            parentId: $request->getParentId()
        );
    }
}
