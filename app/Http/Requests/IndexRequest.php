<?php

namespace App\Http\Requests;

class IndexRequest
{
    public function getParentId(): int {
        return auth()->id();
    }
}
