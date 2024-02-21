<?php

namespace App\Repositories\products\Read;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductsReadRepository implements ProductsReadRepositoryInterface
{
    public function getByName(string $name):? Product
    {
        return Product::query()->where('name', $name)->first();
    }

    public function index():Collection
    {
        return Product::query()->get();
    }
}
