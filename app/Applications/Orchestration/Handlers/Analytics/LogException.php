<?php

namespace App\Applications\Orchestration\Handlers\Analytics;

use App\Domains\Analytics\Aggregates\EventLog;
use App\SharedKernels\Exceptions\ExceptionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogException implements ShouldQueue
{
    public string $connection = 'database';

    public string $queue = 'exceptions';

    public function handle(ExceptionEvent $event): void
    {
        EventLog::factory()->createFromException($event);
    }
}
