<?php

namespace App\Repositories\tokens\Read;

use App\Models\Token;

class TokensReadRepository implements TokensReadRepositoryInterface
{
    public function getByUserId(int $id): ? Token
    {
        return Token::query()->where('user_id', $id)->first();
    }
}
