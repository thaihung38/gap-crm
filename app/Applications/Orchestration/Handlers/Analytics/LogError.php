<?php

namespace App\Applications\Orchestration\Handlers\Analytics;

use App\Domains\Analytics\Aggregates\EventLog;
use App\SharedKernels\Events\ErrorEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogError implements ShouldQueue
{
    public string $connection = 'database';

    public string $queue = 'exceptions';

    public function handle(ErrorEvent $event): void
    {
        EventLog::factory()->createFromError($event);
    }
}
