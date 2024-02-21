<?php

namespace App\Repositories\user;

use App\Models\User;
use App\Exceptions\SavingErrorException;

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
}
