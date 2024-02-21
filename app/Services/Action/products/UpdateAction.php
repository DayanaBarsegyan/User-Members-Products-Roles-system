<?php

namespace App\Services\Action\products;

use Exception;
use App\Services\DTO\products\UpdateRequestDTO;
use App\Repositories\products\Read\ProductsReadRepositoryInterface;
use App\Repositories\products\Write\ProductsWriteRepositoryInterface;

class UpdateAction
{
    public function __construct(
        private ProductsWriteRepositoryInterface $productsWriteRepository,
        private ProductsReadRepositoryInterface $productsReadRepository

    ) {}

    public function run(UpdateRequestDTO $dto):bool
    {
        $product = $this->productsReadRepository->getByName($dto->name);

        if($product)
        {
            throw new Exception("Product already exists in products table!!!");
        }

        return $this->productsWriteRepository->update($dto);
    }
}
