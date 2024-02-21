<?php

namespace App\Repositories\users_products\Write;

use App\Models\UserProduct;

interface UsersProductsWriteRepositoryInterface
{
    public function save(UserProduct $userProduct):bool;
    public function deleteByProductId(int $id):void;
}
