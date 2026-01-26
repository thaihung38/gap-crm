<?php

namespace App\Applications\Orchestration\Listeners;

use Illuminate\Support\Facades\Event;

class AnalyticsListener
{
    public static function listen(): void
    {
        array_map(function ($listener) {
            Event::listen(\App\SharedKernels\Events\EventDispatched::class, $listener);
        },
            [
                \App\Applications\Orchestration\Handlers\Analytics\LogEvent::class,
            ]);
    }
}
