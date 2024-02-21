<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\Action\LoginAction;
use App\Services\Action\RegisterAction;
use App\Services\DTO\RegisterRequestDTO;
use App\Http\Requests\members\RegisterRequest;

class AuthController extends Controller

{
    public function __construct(
        public RegisterAction $registerAction,
        public LoginAction $loginAction
    ) {}

    public function register(RegisterRequest $registerRequest): User
    {
        $dto = RegisterRequestDTO::fromRequest($registerRequest);

        return $this->registerAction->run($dto);
    }

    public function login(LoginRequest $loginRequest): bool
    {
        return $this->loginAction->run($loginRequest->getEmail(), $loginRequest->getPassword());
    }

    public function logout(): string
    {
        Auth::logout();

        return 'User successfully logged out!!!';
    }
}
