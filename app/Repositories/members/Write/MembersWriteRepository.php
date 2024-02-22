<?php

namespace App\Repositories\members\Write;

use App\Models\Member;
use App\Exceptions\SavingErrorException;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\DeletingErrorException;
use App\Services\DTO\members\UpdateRequestDTO;

class MembersWriteRepository implements MembersWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Member::query();
    }

    public function save(Member $member):Member
    {
        if(!$member->save())
        {
            throw new SavingErrorException();
        }

        return $member;
    }

    public function delete(int $id):bool
    {
        $member = $this->query()->where('id', $id)->first();

        if(!$member->delete()) {
            throw new DeletingErrorException();
        }

        return true;
    }

    public function update(UpdateRequestDTO $dto, int $roleId): bool
    {
        $member = Member::query()->where('id', $dto->id)->firstOrFail();

        return  $member->update(['email' => $dto->email,
                                 'username' => $dto->username,
                                 'gender' => $dto->gender,
                                 'password' => $dto->password,
                                 'role_id' => $roleId]);
    }

    public function deleteMemberRole(Member $member):void
    {
        $member->setRoleId(0);
    }
}
