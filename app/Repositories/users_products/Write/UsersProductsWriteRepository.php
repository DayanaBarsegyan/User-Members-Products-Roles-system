<?php

namespace App\Repositories\users_products\Write;

use App\Models\UserProduct;
use App\Exceptions\SavingErrorException;

class UsersProductsWriteRepository implements UsersProductsWriteRepositoryInterface
{
    public function save(UserProduct $userProduct):bool
    {
        if(!$userProduct->save())
        {
            throw new SavingErrorException();
        }

        return true;
    }

    public function deleteByProductId(int $id):void
    {
        UserProduct::query()->where('product_id', $id)->delete();
    }
}
