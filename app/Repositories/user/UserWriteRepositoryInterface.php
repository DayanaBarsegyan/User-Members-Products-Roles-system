<?php

namespace App\Repositories\user;

use App\Models\User;

interface UserWriteRepositoryInterface
{
    public function save(User $user):User;
}
