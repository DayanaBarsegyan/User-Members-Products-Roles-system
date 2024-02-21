<?php

namespace App\Services\Action\products;

use App\Models\Product;
use App\Models\UserProduct;
use App\Services\DTO\products\CreateRequestDTO;
use App\Repositories\products\Read\ProductsReadRepositoryInterface;
use App\Repositories\products\Write\ProductsWriteRepositoryInterface;
use App\Repositories\users_products\Write\UsersProductsWriteRepositoryInterface;

class CreateAction
{
    public function __construct(
        private ProductsReadRepositoryInterface $productsReadRepository,
        private ProductsWriteRepositoryInterface $productsWriteRepository,
        private UsersProductsWriteRepositoryInterface $usersProductsWriteRepository
    ){}

    public function run(CreateRequestDTO $dto):bool
    {
        $product = $this->productsReadRepository->getByName($dto->name);

        if(!$product) {
            $product = Product::staticCreate($dto);

            $this->productsWriteRepository->save($product);
        }

        $userProductInstance = UserProduct::staticCreate($dto->parentId, $product->id);

        if(!$this->usersProductsWriteRepository->save($userProductInstance))
        {
            $this->productsWriteRepository->deleteProduct($product);

            return false;
        }

        return true;
    }
}
