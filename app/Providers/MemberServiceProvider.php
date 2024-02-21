<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\members\Read\MembersReadRepository;
use App\Repositories\members\Write\MembersWriteRepository;
use App\Repositories\members\Read\MembersReadRepositoryInterface;
use App\Repositories\members\Write\MembersWriteRepositoryInterface;

class MemberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MembersReadRepositoryInterface::class, MembersReadRepository::class);
        $this->app->bind(MembersWriteRepositoryInterface::class, MembersWriteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
