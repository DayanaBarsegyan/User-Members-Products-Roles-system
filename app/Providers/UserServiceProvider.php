<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\user\Read\UserReadRepository;
use App\Repositories\user\Write\UserWriteRepository;
use App\Repositories\user\Read\UserReadRepositoryInterface;
use App\Repositories\user\Write\UserWriteRepositoryInterface;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserWriteRepositoryInterface::class, UserWriteRepository::class);
        $this->app->bind(UserReadRepositoryInterface::class, UserReadRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
