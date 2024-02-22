<?php

namespace App\Repositories\products\Write;

use App\Models\Product;
use App\Exceptions\SavingErrorException;
use App\Exceptions\DeletingErrorException;
use App\Services\DTO\products\UpdateRequestDTO;

class ProductsWriteRepository implements ProductsWriteRepositoryInterface
{
    public function save(Product $product):void
    {
        if(!$product->save())
        {
            throw new SavingErrorException();
        }
    }

    public function deleteProduct(Product $product):bool
    {
        if(!$product->delete())
        {
            throw new DeletingErrorException();
        }

        return true;
    }

    public function delete(int $id):bool
    {
        $product = Product::query()->find($id);

        if (!$product->delete())
        {
            throw new DeletingErrorException();
        }

        return true;
    }

    public function update(UpdateRequestDTO $dto):bool
    {
        $product = Product::query()->where('id', $dto->id)->first();

        return  $product->update(['name' => $dto->name,
                                  'description' => $dto->category,
                                  'category' => $dto->description]);

    }
}
