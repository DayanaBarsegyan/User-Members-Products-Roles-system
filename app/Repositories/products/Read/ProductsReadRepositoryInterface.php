<?php

namespace App\Repositories\products\Read;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductsReadRepositoryInterface
{
    public function getByName(string $name):? Product;
    public function index():Collection;
}
