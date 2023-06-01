<?php

namespace App\Providers;

use App\Repos\BaseRepo;
use App\Repos\RepoInterface;
use Illuminate\Support\ServiceProvider;

class RepoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RepoInterface::class, BaseRepo::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
