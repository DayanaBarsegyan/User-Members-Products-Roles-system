<?php

namespace App\Services\Action;

use Exception;
use App\Events\PasswordChangedEvent;
use App\Services\DTO\ResetPasswordDTO;
use App\Repositories\user\Read\UserReadRepositoryInterface;
use App\Repositories\user\Write\UserWriteRepositoryInterface;
use App\Repositories\tokens\Read\TokensReadRepositoryInterface;

class ResetPasswordAction
{
    public function __construct(
        private UserReadRepositoryInterface $userReadRepository,
        private UserWriteRepositoryInterface $userWriteRepository,
        private TokensReadRepositoryInterface $tokensReadRepository
    ){}

    public function run(ResetPasswordDTO $dto): bool
    {
        $user = $this->userReadRepository->getUserByEmail($dto->email);

        $token = $this->tokensReadRepository->getByUserId($user->id);

        if($dto->token === $token->token) {
            $result = $this->userWriteRepository->updatePassword($user, $dto->password);
            if ($result) {
                PasswordChangedEvent::dispatch($user->id);

                return true;
            }
        }

        throw new Exception('Token is not valid');
    }
}
