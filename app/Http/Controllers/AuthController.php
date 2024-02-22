<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

use Illuminate\Http\JsonResponse;
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

    public function register(RegisterRequest $registerRequest): UserResource
    {
        $dto = RegisterRequestDTO::fromRequest($registerRequest);

        $user = $this->registerAction->run($dto);

        return new UserResource($user);
    }

    public function login(LoginRequest $loginRequest): JsonResponse
    {
        $this->loginAction->run($loginRequest->getEmail(), $loginRequest->getPassword());

        return response()->json(['status' => 'success']);
    }

    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json(['message' => 'User successfully logged out!!!']);
    }
}
