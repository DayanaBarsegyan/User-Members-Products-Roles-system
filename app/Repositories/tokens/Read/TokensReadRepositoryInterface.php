<?php

namespace App\Repositories\tokens\Read;

use App\Models\Token;

interface TokensReadRepositoryInterface
{
    public function getByUserId(int $id): ? Token;
}
