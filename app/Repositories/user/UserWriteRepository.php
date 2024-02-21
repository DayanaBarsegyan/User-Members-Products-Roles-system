<?php

namespace App\Repositories\user;

use App\Models\User;
use Mockery\Exception;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function save(User $user):User
    {
        if(!$user->save())
        {
            throw new Exception("Registration has been failed!!!");
        }

        return $user;
    }
}
