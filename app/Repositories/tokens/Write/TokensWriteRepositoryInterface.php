<?php

namespace App\Repositories\tokens\Write;

use App\Models\Token;

interface TokensWriteRepositoryInterface
{
    public function save(Token $token): bool;
    public function updateToken(Token $token, string $randomToken): bool;
    public function deleteByUserId(int $id): bool;
    public function deleteOldTokens():void;
}
