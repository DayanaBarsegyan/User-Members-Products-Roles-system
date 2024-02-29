<?php

namespace App\Services\Action;

use App\Models\User;
use App\Repositories\user\Write\UserWriteRepositoryInterface;
use App\Services\DTO\RegisterRequestDTO;

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
