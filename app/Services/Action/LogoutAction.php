<?php

namespace App\Services\Action;

use Laravel\Passport\Token;

class LogoutAction
{
    public function run():void
    {
        $user = auth()->id();
        $token = Token::query()->where('user_id', $user)->first();
        $token->revoke();
    }
}
