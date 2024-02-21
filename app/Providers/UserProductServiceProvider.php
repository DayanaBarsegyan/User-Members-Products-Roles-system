<?php

namespace App\Providers;

use App\Repositories\users_products\Write\UsersProductsWriteRepository;
use App\Repositories\users_products\Write\UsersProductsWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UsersProductsWriteRepositoryInterface::class, UsersProductsWriteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
