<?php

namespace App\Services\Action;

use Illuminate\Support\Facades\Http;

class LoginAction
{
    public function run(string $email, string $password):array
    {
        $response = Http::asForm()->post(env('PASSPORT_LOGIN_ENDPOINT'), [
            'grant_type' => 'password',
            'client_id' => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'username' => $email,
            'password' => $password,
            'scope' => '*',
        ]);

        return $response->json();
    }
}
