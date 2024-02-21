<?php

namespace App\Services\Action\roles;

use App\Repositories\roles\Write\RolesWriteRepositoryInterface;
use App\Repositories\members\Read\MembersReadRepositoryInterface;
use App\Repositories\members\Write\MembersWriteRepositoryInterface;

class DeleteAction
{
    public function __construct(
        private RolesWriteRepositoryInterface $rolesWriteRepository,
        private MembersReadRepositoryInterface $membersReadRepository,
        private MembersWriteRepositoryInterface $membersWriteRepository
    ){}

    public function run(int $id):bool
    {
        $status = $this->rolesWriteRepository->delete($id);

        if($status)
        {
            $updatedMembers = $this->membersReadRepository->getByRoleId($id);

            foreach ($updatedMembers as $updateMember)
            {
                $this->membersWriteRepository->deleteMemberRole($updateMember);
            }

            return true;
        }

        return false;
    }
}
