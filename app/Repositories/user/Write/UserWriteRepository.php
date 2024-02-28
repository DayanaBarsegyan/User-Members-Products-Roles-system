<?php

namespace App\Repositories\user\Write;

use App\Exceptions\SavingErrorException;
use App\Models\User;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function save(User $user):User
    {
        if(!$user->save())
        {
            throw new SavingErrorException();
        }

        return $user;
    }

    public function updatePassword(User $user, string $password): bool
    {
        return $user->update(['password' => $password]);
    }
}
