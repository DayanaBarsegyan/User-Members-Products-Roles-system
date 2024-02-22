<?php
//done
namespace App\Services\Action;

use Illuminate\Support\Facades\Auth;
use App\Exceptions\AuthorizationFailException;

class LoginAction
{
    public function run(string $email, string $password):bool
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw new AuthorizationFailException();
        }

        return true;
    }
}
