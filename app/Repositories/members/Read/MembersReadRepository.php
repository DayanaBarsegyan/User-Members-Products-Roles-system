<?php

namespace App\Repositories\members\Read;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class MembersReadRepository implements MembersReadRepositoryInterface
{
    private function query(): Builder
    {
        return Member::query();
    }

    public function index(int $parentId):Collection
    {
        return $this->query()->where('parent_id', $parentId)->get();
    }

    public function getByRoleId(int $roleId):Collection
    {
        return $this->query()->where('role_id', $roleId)->get();
    }
}
