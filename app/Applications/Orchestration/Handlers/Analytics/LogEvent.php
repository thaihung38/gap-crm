<?php

namespace App\Applications\Orchestration\Handlers\Analytics;

use App\Domains\Analytics\Aggregates\EventLog;
use App\SharedKernels\Events\EventDispatched;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogEvent implements ShouldQueue
{
    public string $connection = 'database';

    public string $queue = 'events';

    public function handle(EventDispatched $event): void
    {
        EventLog::factory()->createFromDispatched($event);
    }
}
