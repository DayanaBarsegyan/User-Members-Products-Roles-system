<?php

namespace App\Services\DTO\members;

use App\Http\Requests\members\UpdateRequest;

class UpdateRequestDTO
{
    public function __construct(
        public string $username,
        public string $gender,
        public string $email,
        public string $password,
        public string $role,
        public int $id,
        public int $parentId
    ) {}

    public static function fromRequest(UpdateRequest $request): UpdateRequestDTO
    {
        return new self(
            username: $request->getUserName(),
            gender: $request->getGender(),
            email: $request->getEmail(),
            password: $request->getPassword(),
            role: $request->getRole(),
            id: $request->getId(),
            parentId: $request->getParentId()
        );
    }
}
