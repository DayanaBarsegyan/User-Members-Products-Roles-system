<?php

namespace App\Services\Action;

use Illuminate\Support\Facades\Http;

class RefreshTokenAction
{
    public function run(string $refreshToken):array
    {
        $response = Http::asForm()->post(env('PASSPORT_LOGIN_ENDPOINT'), [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_id' => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'scope' => '',
        ]);

        return $response->json();
    }
}
