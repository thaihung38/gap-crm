<?php

namespace App\Providers;

use App\Domains\IAM\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\IAM\UserRepository;
use Illuminate\Support\ServiceProvider;

class IAMServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/IAM');
    }
}
