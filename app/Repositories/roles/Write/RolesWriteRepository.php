<?php

namespace App\Repositories\roles\Write;

use Exception;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class RolesWriteRepository implements RolesWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Role::query();
    }

    public function save(Role $role): Role
    {
        if(!$role->save()) {
            throw new Exception("Role has not been saved!!!");
        }

        return $role;
    }

    public function delete(int $id): bool
    {
        $findRole = $this->query()->where('id', $id);

        if(!$findRole->delete()) {
            return false;
        }

        return true;
    }

    public function update(int $id, string $role): bool
    {
        $existingRole = $this->query()->where('role', $role)->first();

        if($existingRole) {
            throw new Exception('Role already exists in role table!!!');
        }

        return $this->query()->find($id)->update(['role' => $role]);
    }
}
