<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    protected $table = 'roles';

    protected $fillable = [
        'role'
    ];

    public static function staticCreate(string $role, int $parentId): Role
    {
        $roleModel = new self();
        $roleModel->setRole($role);
        $roleModel->setParentId($parentId);

        return $roleModel;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function setParentId(int $parentId): void
    {
        $this->user_id = $parentId;
    }
}
