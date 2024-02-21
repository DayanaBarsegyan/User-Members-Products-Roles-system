<?php

namespace App\Services\Action\members;

use App\Repositories\members\Write\MembersWriteRepositoryInterface;

class DeleteAction
{
    public function __construct(
        private MembersWriteRepositoryInterface $membersWriteRepository
    ){}

    public function run(int $id):bool
    {
        return $this->membersWriteRepository->delete($id);
    }
}
