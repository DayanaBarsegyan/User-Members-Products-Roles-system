<?php

namespace App\Services\Action\products;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\products\Read\ProductsReadRepositoryInterface;

class IndexAction
{
    public function __construct(
        private ProductsReadRepositoryInterface $productsReadRepository
    ) {}

    public function run():Collection
    {
        return $this->productsReadRepository->index();
    }
}
