<?php

namespace App\Services\Action\roles;

use App\Repositories\roles\Write\RolesWriteRepositoryInterface;

class UpdateAction
{

    public function __construct(
        private RolesWriteRepositoryInterface $rolesWriteRepository
    ){}

    public function run(int $id, string $role): bool
    {
        return $this->rolesWriteRepository->update($id, $role);
    }
}
