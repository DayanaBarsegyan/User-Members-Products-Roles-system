<?php

namespace App\Services\Action\roles;

use Illuminate\Support\Collection;
use App\Repositories\roles\Read\RolesReadRepositoryInterface;

class IndexAction
{
    public function __construct(
        private   RolesReadRepositoryInterface $rolesReadRepository
    ){}

    public function run():Collection
    {
        return $this->rolesReadRepository->index();
    }
}
