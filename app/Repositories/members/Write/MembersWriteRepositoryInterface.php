<?php

namespace App\Repositories\members\Write;

use App\Models\Member;
use App\Services\DTO\members\UpdateRequestDTO;

interface MembersWriteRepositoryInterface
{
    public function save(Member $member):Member;
    public function delete(int $id):bool;
    public function update(UpdateRequestDTO $dto, int $roleId):bool;
    public function deleteMemberRole(Member $member):void;
}
