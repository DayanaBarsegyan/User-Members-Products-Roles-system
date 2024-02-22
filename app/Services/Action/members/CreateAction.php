<?php

namespace App\Services\Action\members;

use Exception;
use App\Models\Member;
use App\UseCases\RoleCreateUseCase;
use Illuminate\Database\Eloquent\Model;
use App\Services\DTO\members\CreateRequestDTO;
use App\Repositories\members\Write\MembersWriteRepositoryInterface;

class CreateAction
{
    public function __construct(
        private RoleCreateUseCase $roleCreateUseCase,
        private MembersWriteRepositoryInterface $membersWriteRepository
    ){}
    /**
     * @throws Exception
     */

    public function run(CreateRequestDTO $dto):Member
    {
        $role = $this->roleCreateUseCase->run($dto->role, $dto->parentId);

        $member = Member::staticCreate($dto, $role->id);

        return $this->membersWriteRepository->save($member);
    }
}
