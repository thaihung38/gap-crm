<?php

namespace App\Applications\Orchestration\Handlers\Analytics;

use App\Domains\Analytics\Aggregates\EventLog;
use App\SharedKernels\Events\EventDispatched;

class LogEvent
{
    public function handle(EventDispatched $event): void
    {
        EventLog::factory()->createFromDispatched($event);
    }
}
