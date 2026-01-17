<?php

namespace App\Providers;

use App\Domains\Recruitment\Repositories\CandidateRepositoryInterface;
use App\Infrastructure\Persistence\Recruitment\CandidateRepository;
use Illuminate\Support\ServiceProvider;

class RecruitmentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CandidateRepositoryInterface::class, CandidateRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web/commands/candidate.php');
        $this->loadRoutesFrom(__DIR__.'/../../routes/web/queries/candidate.php');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/Recruitment');
    }
}
