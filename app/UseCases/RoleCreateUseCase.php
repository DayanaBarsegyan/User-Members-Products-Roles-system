<?php

namespace App\UseCases;

use App\Models\Role;
use App\Repositories\roles\Read\RolesReadRepositoryInterface;
use App\Repositories\roles\Write\RolesWriteRepositoryInterface;

class RoleCreateUseCase
{
    public function __construct(
        private RolesReadRepositoryInterface $rolesReadRepository,
        private RolesWriteRepositoryInterface $rolesWriteRepository
    ) {}

    public function run(string $role, int $parentId):Role
    {
        $roleModel = $this->rolesReadRepository->getByRole($role);

        if(!$roleModel) {
            $roleModel = Role::staticCreate($role, $parentId);
            $this->rolesWriteRepository->save($roleModel);
        }

        return $roleModel;
    }
}
