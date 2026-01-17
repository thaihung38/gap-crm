<?php

namespace App\Applications\Orchestration;

use App\Applications\Orchestration\Listeners\RecruitmentEventListener;

class EventRegistry
{
    public static function register(): void
    {
        RecruitmentEventListener::listen();
    }
}
