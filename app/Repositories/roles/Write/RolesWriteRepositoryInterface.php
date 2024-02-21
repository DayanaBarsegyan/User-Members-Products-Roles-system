<?php

namespace App\Repositories\roles\Write;

use App\Models\Role;

interface RolesWriteRepositoryInterface
{
    public function save(Role $role): Role;
    public function delete(int $id): bool;
    public function update(int $id, string $role): bool;
}
