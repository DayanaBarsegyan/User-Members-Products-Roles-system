<?php

namespace App\Repositories\user\Read;

use App\Models\User;

interface UserReadRepositoryInterface
{
    public function getUserByEmail(string $email):? User;
}
