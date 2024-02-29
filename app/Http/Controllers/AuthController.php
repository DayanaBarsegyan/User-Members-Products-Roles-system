<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Services\Action\LoginAction;
use App\Http\Resources\UserResource;
use App\Services\Action\LogoutAction;
use App\Http\Resources\TokenResource;
use App\Services\DTO\ResetPasswordDTO;
use App\Services\Action\RegisterAction;
use App\Services\DTO\RegisterRequestDTO;
use App\Http\Requests\RefreshTokenRequest;
use App\Services\Action\RefreshTokenAction;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\Action\ResetPasswordAction;
use App\Http\Requests\RecoverPasswordRequest;
use App\Services\Action\RecoverPasswordAction;
use App\Http\Requests\members\RegisterRequest;


class AuthController extends Controller

{
    public function __construct(
        public RegisterAction $registerAction,
        public LoginAction $loginAction,
        public RecoverPasswordAction $recoverPasswordAction,
        public ResetPasswordAction $resetPasswordAction,
        public LogoutAction $logoutAction,
        public RefreshTokenAction $refreshTokenAction
    ) {}

    public function register(RegisterRequest $registerRequest): UserResource
    {
        $dto = RegisterRequestDTO::fromRequest($registerRequest);

        $user = $this->registerAction->run($dto);

        return new UserResource($user);
    }

    public function login(LoginRequest $loginRequest): TokenResource
    {
        $response = $this->loginAction->run($loginRequest->getEmail(), $loginRequest->getPassword());

        return new TokenResource($response);
    }

    public function logout(): JsonResponse
    {
        $this->logoutAction->run();

        return response()->json(['message' => 'User successfully logged out!!!']);
    }

    public function recover(RecoverPasswordRequest $recoverPasswordRequest): JsonResponse
    {
        $this->recoverPasswordAction->run($recoverPasswordRequest->getEmail());

        return response()->json(['status' => 'success']);
    }

    public function reset(ResetPasswordRequest $resetPasswordRequest): JsonResponse
    {
        $dto = ResetPasswordDTO::fromRequest($resetPasswordRequest);

        $this->resetPasswordAction->run($dto);

        return response()->json(['status' => 'success']);
    }

    public function refresh(RefreshTokenRequest $refreshTokenRequest): TokenResource
    {
        $response = $this->refreshTokenAction->run($refreshTokenRequest->getToken());

        return new TokenResource($response);
    }
}
