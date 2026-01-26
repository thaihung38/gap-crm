<?php

namespace App\Providers;

use App\Applications\Orchestration\CrossDomainEventRegistry;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(AnalyticsServiceProvider::class);
        $this->app->register(IAMServiceProvider::class);
        $this->app->register(RecruitmentServiceProvider::class);

        $this->app->bind('DispatcherAccessor', function () {
            return $this->app->make(\App\SharedKernels\Events\DispatcherAccessor::class);
        });

        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \App\SharedKernels\Exceptions\ExceptionHandler::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        CrossDomainEventRegistry::register();
    }
}
