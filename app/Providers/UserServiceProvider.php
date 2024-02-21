<?php

namespace App\Providers;

use App\Repositories\user\UserWriteRepository;
use App\Repositories\user\UserWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserWriteRepositoryInterface::class, UserWriteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
