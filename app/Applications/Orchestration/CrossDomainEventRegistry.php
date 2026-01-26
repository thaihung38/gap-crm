<?php

namespace App\Applications\Orchestration;

use App\Applications\Orchestration\Listeners\AnalyticsListener;
use App\Applications\Orchestration\Listeners\RecruitmentEventListener;

class CrossDomainEventRegistry
{
    public static function register(): void
    {
        AnalyticsListener::listen();
        RecruitmentEventListener::listen();
    }
}
