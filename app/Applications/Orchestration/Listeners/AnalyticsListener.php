<?php

namespace App\Applications\Orchestration\Listeners;

use Illuminate\Support\Facades\Event;

class AnalyticsListener
{
    // php artisan queue:work --stop-when-empty --queue=events,exceptions
    public static function listen(): void
    {
        array_map(function ($listener) {
            Event::listen(\App\SharedKernels\Events\EventDispatched::class, $listener);
        },
            [
                \App\Applications\Orchestration\Handlers\Analytics\LogEvent::class,
            ]);

        Event::listen(
            \App\SharedKernels\Events\ErrorEvent::class,
            \App\Applications\Orchestration\Handlers\Analytics\LogError::class
        );
    }
}
