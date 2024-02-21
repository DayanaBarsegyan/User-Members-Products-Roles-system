<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\DTO\members\CreateRequestDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'username',
        'gender',
        'email',
        'password',
        'parent_id',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    public static function staticCreate(CreateRequestDTO $dto, int $id): Member
    {
        $member = new self();

        $member->setUserName($dto->username);
        $member->setGender($dto->gender);
        $member->setEmail($dto->email);
        $member->setPassword($dto->password);
        $member->setParentID();
        $member->setRoleId($id);

        return $member;
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

    public function setParentID(): void
    {
        $this->parent_id = auth()->id();
    }

    public function setRoleId(int $roleId): void
    {
        $this->role_id = $roleId;
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
