<?php

namespace App\Repositories\user\Write;

use App\Models\User;

interface UserWriteRepositoryInterface
{
    public function save(User $user):User;
    public function updatePassword(User $user, string $password) : bool;
}
