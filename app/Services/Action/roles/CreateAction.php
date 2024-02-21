<?php

namespace App\Services\Action\roles;

use App\Models\Role;
use App\UseCases\RoleCreateUseCase;

class CreateAction
{
    public function __construct(
        protected RoleCreateUseCase $roleCreateUseCase
    ) {}

    public function run(string $role, int $parentId): Role
    {
        return $this->roleCreateUseCase->run($role, $parentId);
    }
}
