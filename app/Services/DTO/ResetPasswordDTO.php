<?php

namespace App\Services\DTO;

use App\Http\Requests\ResetPasswordRequest;

class ResetPasswordDTO
{
    public function __construct(
        public string $email,
        public string $token,
        public string $password
    ) {}

    public static function fromRequest(ResetPasswordRequest $request): ResetPasswordDTO
    {
        return new self(
            email: $request->getEmail(),
            token: $request->getToken(),
            password: $request->getPassword(),
        );
    }
}
