<?php

namespace App\Repositories\tokens\Write;


use App\Exceptions\DeletingErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Token;
use Carbon\Carbon;

class TokensWriteRepository implements TokensWriteRepositoryInterface
{
    public function save(Token $token): bool
    {
        if(!$token->save())
        {
            throw new SavingErrorException();
        }

        return true;
    }

    public function updateToken(Token $token, string $randomToken): bool
    {
        return $token->update(['token' => $randomToken]);
    }

    public function deleteByUserId(int $id): bool
    {
        $token = Token::query()->where('user_id', $id)->firstOrFail();

        if(!$token->delete())
        {
            throw new DeletingErrorException();
        }

        return true;
    }

    public function deleteOldTokens():void
    {
        $fifteenMinutesAgo = Carbon::now()->subMinutes(15);
        Token::query()->where('updated_at', '<', $fifteenMinutesAgo)->delete();
    }
}
