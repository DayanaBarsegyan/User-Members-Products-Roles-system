<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = 'tokens';

    protected $fillable = [
        'user_id',
        'token'
    ];

    public static function staticCreate(int $userId, string $token): Token
    {
        $tokenInstance = new self();

        $tokenInstance->setUserId($userId);
        $tokenInstance->setToken($token);

        return $tokenInstance;
    }

    public function setUserId(int $id): void
    {
        $this->user_id = $id;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}
