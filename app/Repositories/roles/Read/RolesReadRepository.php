<?php

namespace App\Repositories\roles\Read;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RolesReadRepository implements RolesReadRepositoryInterface
{
    private function query():Builder
    {
        return Role::query();
    }

    public function getByRole(string $role):? Role
    {
        return $this->query()->where('role', $role)->first();
    }

    public function index():Collection
    {
        return $this->query()->get();
    }

}
