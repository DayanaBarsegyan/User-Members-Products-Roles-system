<?php

namespace App\Repositories\user\Read;

use App\Models\User;

class UserReadRepository implements UserReadRepositoryInterface
{
    public function getUserByEmail(string $email):? User
    {
        return User::query()->where('email', $email)->firstOrFail();
    }
}
