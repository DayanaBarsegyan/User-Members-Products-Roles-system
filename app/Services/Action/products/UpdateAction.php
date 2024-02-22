<?php

namespace App\Services\Action\products;

use App\Exceptions\AlreadyExistsException;
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
            throw new AlreadyExistsException();
        }

        return $this->productsWriteRepository->update($dto);
    }
}
