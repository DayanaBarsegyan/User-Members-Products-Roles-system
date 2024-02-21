<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\products\Read\ProductsReadRepository;
use App\Repositories\products\Write\ProductsWriteRepository;
use App\Repositories\products\Read\ProductsReadRepositoryInterface;
use App\Repositories\products\Write\ProductsWriteRepositoryInterface;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductsReadRepositoryInterface::class, ProductsReadRepository::class);
        $this->app->bind(ProductsWriteRepositoryInterface::class, ProductsWriteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
