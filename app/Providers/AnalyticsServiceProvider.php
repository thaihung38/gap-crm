<?php

namespace App\Providers;

use App\Domains\IAM\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\IAM\UserRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/Analytics');
    }
}
