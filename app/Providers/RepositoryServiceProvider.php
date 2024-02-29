<?php

namespace App\Providers;

use App\Repositories\user\Read\UserReadRepository;
use App\Repositories\roles\Read\RolesReadRepository;
use App\Repositories\user\Write\UserWriteRepository;
use App\Repositories\tokens\Read\TokensReadRepository;
use App\Repositories\roles\Write\RolesWriteRepository;
use App\Repositories\tokens\Write\TokensWriteRepository;
use App\Repositories\members\Read\MembersReadRepository;
use App\Repositories\products\Read\ProductsReadRepository;
use App\Repositories\members\Write\MembersWriteRepository;
use App\Repositories\user\Read\UserReadRepositoryInterface;
use App\Repositories\products\Write\ProductsWriteRepository;
use App\Repositories\user\Write\UserWriteRepositoryInterface;
use App\Repositories\roles\Read\RolesReadRepositoryInterface;
use App\Repositories\roles\Write\RolesWriteRepositoryInterface;
use App\Repositories\tokens\Read\TokensReadRepositoryInterface;
use App\Repositories\members\Read\MembersReadRepositoryInterface;
use App\Repositories\tokens\Write\TokensWriteRepositoryInterface;
use App\Repositories\members\Write\MembersWriteRepositoryInterface;
use App\Repositories\products\Read\ProductsReadRepositoryInterface;
use App\Repositories\products\Write\ProductsWriteRepositoryInterface;
use App\Repositories\users_products\Write\UsersProductsWriteRepository;
use App\Repositories\users_products\Write\UsersProductsWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MembersReadRepositoryInterface::class, MembersReadRepository::class);
        $this->app->bind(MembersWriteRepositoryInterface::class, MembersWriteRepository::class);

        $this->app->bind(ProductsReadRepositoryInterface::class, ProductsReadRepository::class);
        $this->app->bind(ProductsWriteRepositoryInterface::class, ProductsWriteRepository::class);

        $this->app->bind(RolesReadRepositoryInterface::class, RolesReadRepository::class);
        $this->app->bind(RolesWriteRepositoryInterface::class, RolesWriteRepository::class);

        $this->app->bind(TokensWriteRepositoryInterface::class, TokensWriteRepository::class);
        $this->app->bind(TokensReadRepositoryInterface::class, TokensReadRepository::class);

        $this->app->bind(UsersProductsWriteRepositoryInterface::class, UsersProductsWriteRepository::class);

        $this->app->bind(UserWriteRepositoryInterface::class, UserWriteRepository::class);
        $this->app->bind(UserReadRepositoryInterface::class, UserReadRepository::class);

    }

    public function boot(): void
    {
        //
    }
}
