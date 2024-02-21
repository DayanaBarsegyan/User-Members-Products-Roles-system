<?php

namespace App\Services\Action;

use App\Models\User;
use App\Services\DTO\RegisterRequestDTO;
use App\Repositories\user\UserWriteRepositoryInterface;

class RegisterAction
{
    public function __construct(
        private UserWriteRepositoryInterface $userWriteRepository
    ){}

    public function run(RegisterRequestDTO $dto):User
    {
        $model = User::staticCreate($dto);

        return $this->userWriteRepository->save($model);
    }
}
