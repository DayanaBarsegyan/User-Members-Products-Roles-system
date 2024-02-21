<?php

namespace App\Repositories\roles\Read;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

interface RolesReadRepositoryInterface
{
    public function getByRole(string $role): ? Role;
    public function index():Collection;
}
