<?php

namespace App\Providers;

use App\Repositories\tokens\Read\TokensReadRepository;
use App\Repositories\tokens\Read\TokensReadRepositoryInterface;
use App\Repositories\tokens\Write\TokensWriteRepository;
use App\Repositories\tokens\Write\TokensWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TokenServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TokensWriteRepositoryInterface::class, TokensWriteRepository::class);
        $this->app->bind(TokensReadRepositoryInterface::class, TokensReadRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
