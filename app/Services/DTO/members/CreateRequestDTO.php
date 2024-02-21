<?php

namespace App\Services\DTO\members;

use App\Http\Requests\members\CreateRequest;

class CreateRequestDTO
{
    public function __construct(
        public string $username,
        public string $gender,
        public string $email,
        public string $password,
        public string $role,
        public int $parentId,
    ) {}

    public static function fromRequest(CreateRequest $request): CreateRequestDTO
    {
        return new self(
            username: $request->getUserName(),
            gender: $request->getGender(),
            email: $request->getEmail(),
            password: $request->getPassword(),
            role: $request->getRole(),
            parentId: $request->getParentId()
        );
    }
}
