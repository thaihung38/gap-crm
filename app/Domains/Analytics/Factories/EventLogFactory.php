<?php

namespace App\Domains\Analytics\Factories;

use App\Domains\Analytics\Aggregates\EventLog;
use App\Domains\Base\Factory;
use App\SharedKernels\Events\EventDispatched;

class EventLogFactory extends Factory
{
    protected $model = \App\Domains\Analytics\Aggregates\EventLog::class;

    public function definition(): array
    {
        return [
            'fqdn' => '\\An\\Event\\Class',
            'process_id' => fake()->uuid(),
            'event_id' => fake()->uuid(),
            'dispatch_time' => fake()->dateTime(),
        ];
    }

    public function createFromDispatched(EventDispatched $event): EventLog
    {
        return $this->create([
            'fqdn' => $event->event::class,
            'process_id' => $event->event->processId,
            'event_id' => $event->event->eventId,
            'dispatch_time' => $event->event->createdAt,
        ]);
    }
}
