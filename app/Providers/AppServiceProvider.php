<?php

namespace App\Providers;

use App\Applications\Orchestration\CrossDomainEventRegistry;
use App\Http\Middlewares\GlobalStore;
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

//        $this->app->singleton(GlobalStore::class, function () {
//            return new GlobalStore();
//        });

        $this->app->bind('DispatcherAccessor', function () {
            return $this->app->make(\App\SharedKernels\Events\DispatcherAccessor::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        CrossDomainEventRegistry::register();
    }
}
