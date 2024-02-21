<?php

namespace App\Repositories\roles\Write;

use App\Models\Role;
use App\Exceptions\SavingErrorException;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\AlreadyExistsException;

class RolesWriteRepository implements RolesWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Role::query();
    }

    public function save(Role $role): Role
    {
        if(!$role->save()) {
            throw new SavingErrorException();
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
            throw new AlreadyExistsException();
        }

        return $this->query()->find($id)->update(['role' => $role]);
    }
}
