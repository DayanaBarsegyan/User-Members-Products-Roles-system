<?php

namespace App\Repositories\products\Write;

use App\Models\Product;
use App\Services\DTO\products\UpdateRequestDTO;

interface ProductsWriteRepositoryInterface
{
    public function save(Product $product):void;
    public function deleteProduct(Product $product):bool;
    public function delete(int $id):bool;
    public function update(UpdateRequestDTO $dto):bool;
}
