<?php

namespace App\Repositories\users_products\Write;

use App\Models\UserProduct;

class UsersProductsWriteRepository implements UsersProductsWriteRepositoryInterface
{
    public function save(UserProduct $userProduct):bool
    {
        if(!$userProduct->save())
        {
            return false;
        }

        return true;
    }

    public function deleteByProductId(int $id):void
    {
        UserProduct::query()->where('product_id', $id)->delete();
    }
}
