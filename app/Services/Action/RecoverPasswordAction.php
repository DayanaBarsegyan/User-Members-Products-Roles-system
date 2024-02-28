<?php

namespace App\Services\Action;

use App\Models\Token;
use App\Repositories\tokens\Read\TokensReadRepositoryInterface;
use App\Repositories\tokens\Write\TokensWriteRepositoryInterface;
use Illuminate\Support\Str;
use App\Jobs\SentNotificationJob;
use App\Repositories\user\Read\UserReadRepositoryInterface;

class RecoverPasswordAction
{
    public function __construct(
        private UserReadRepositoryInterface $userReadRepository,
        private TokensWriteRepositoryInterface $tokensWriteRepository,
        private TokensReadRepositoryInterface $tokensReadRepository
    ) {}

    public function run(string $email): void
    {
        $randomToken = Str::random(30);

        $user = $this->userReadRepository->getUserByEmail($email);

        dispatch(new SentNotificationJob($user, $randomToken));

        $token = $this->tokensReadRepository->getByUserId($user->id);

        if(!$token) {
            $token = Token::staticCreate($user->id, $randomToken);

            $this->tokensWriteRepository->save($token);
        } else {
            $this->tokensWriteRepository->updateToken($token, $randomToken);
        }
    }
}
