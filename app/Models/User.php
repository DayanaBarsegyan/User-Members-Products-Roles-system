<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Services\DTO\RegisterRequestDTO;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    public static function staticCreate(RegisterRequestDTO $dto): User
    {
        $user = new self();

        $user->setUserName($dto->username);
        $user->setGender($dto->gender);
        $user->setEmail($dto->email);
        $user->setPassword($dto->password);

        return $user;
    }

    public function setUserName(string $name): void
    {
        $this->username = $name;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
