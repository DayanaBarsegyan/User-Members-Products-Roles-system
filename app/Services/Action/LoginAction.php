<?php
//done
namespace App\Services\Action;

use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function run(string $email, string $password):bool
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return false;
        }

        return true;
    }
}
