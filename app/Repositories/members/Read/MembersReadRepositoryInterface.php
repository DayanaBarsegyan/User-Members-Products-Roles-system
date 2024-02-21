<?php

namespace App\Repositories\members\Read;


use Illuminate\Database\Eloquent\Collection;

interface MembersReadRepositoryInterface
{
    public function index(int $parentId):Collection;
    public function getByRoleId(int $roleId):Collection;
}
