<?php

namespace App\Services\Action\products;

use App\Repositories\products\Write\ProductsWriteRepositoryInterface;
use App\Repositories\users_products\Write\UsersProductsWriteRepositoryInterface;

class DeleteAction
{
    public function __construct(
        private ProductsWriteRepositoryInterface $productsWriteRepository,
        private UsersProductsWriteRepositoryInterface $usersProductsWriteRepository
    ){}

    public function run(int $id):bool
    {
        $this->usersProductsWriteRepository->deleteByProductId($id);

        return $this->productsWriteRepository->delete($id);
    }
}
