<?php

namespace App\Services\Action\members;

use App\Services\DTO\members\UpdateRequestDTO;
use App\Repositories\members\Write\MembersWriteRepositoryInterface;
use App\UseCases\RoleCreateUseCase;

class UpdateAction
{
    public function __construct(
        private RoleCreateUseCase $roleCreateUseCase,
        private MembersWriteRepositoryInterface $membersWriteRepository,
    ){}

    public function run(UpdateRequestDTO $dto): bool
    {
        $memberRole = $this->roleCreateUseCase->run($dto->role, $dto->parentId);

        return $this->membersWriteRepository->update($dto, $memberRole->id);
    }
}
