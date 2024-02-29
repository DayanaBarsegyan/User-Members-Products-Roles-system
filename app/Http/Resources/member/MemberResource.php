<?php

namespace App\Http\Resources\member;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'username' => $this->username,
            'gender' => $this->gender,
            'roleId' => $this->role_id
        ];
    }
}
