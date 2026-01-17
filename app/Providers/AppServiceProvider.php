<?php

namespace App\Providers;

use App\Applications\Orchestration\EventRegistry;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(IAMServiceProvider::class);
        $this->app->register(RecruitmentServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        EventRegistry::register();
    }
}
