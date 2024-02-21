<?php

namespace App\Services\Action\members;

use App\Repositories\members\Read\MembersReadRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
    public function __construct(
        private MembersReadRepositoryInterface $membersReadRepository
    ) {}

    public function run(int $parentId): Collection
    {
        return $this->membersReadRepository->index($parentId);
    }
}
