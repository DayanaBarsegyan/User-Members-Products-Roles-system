<?php

namespace App\Services\DTO;

use App\Http\Requests\members\RegisterRequest;

class RegisterRequestDTO
{
    public function __construct(
        public string $username,
        public string $gender,
        public string $email,
        public string $password,
    ) {}

    public static function fromRequest(RegisterRequest $request): RegisterRequestDTO
    {
        return new self(
            username: $request->getUserName(),
            gender: $request->getGender(),
            email: $request->getEmail(),
            password: $request->getPassword(),
        );
    }
}
