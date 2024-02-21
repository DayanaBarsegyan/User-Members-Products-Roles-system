<?php

namespace App\Services\DTO\products;

use App\Http\Requests\products\UpdateRequest;

class UpdateRequestDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public string $category,
        public int $id
    ){}

    public static function fromRequest(UpdateRequest $request): UpdateRequestDTO
    {
        return new self(
            name: $request->getName(),
            description: $request->getDescription(),
            category: $request->getCategory(),
            id: $request->getId(),
        );
    }
}
