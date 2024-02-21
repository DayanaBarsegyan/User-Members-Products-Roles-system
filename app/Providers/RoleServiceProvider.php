<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\roles\Read\RolesReadRepository;
use App\Repositories\roles\Write\RolesWriteRepository;
use App\Repositories\roles\Read\RolesReadRepositoryInterface;
use App\Repositories\roles\Write\RolesWriteRepositoryInterface;


class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RolesReadRepositoryInterface::class, RolesReadRepository::class);
        $this->app->bind(RolesWriteRepositoryInterface::class, RolesWriteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
