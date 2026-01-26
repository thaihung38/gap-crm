<?php

namespace App\Domains\Analytics\Factories;

use App\Domains\Analytics\Aggregates\EventLog;
use App\Domains\Base\Factory;
use App\SharedKernels\Events\EventDispatched;
use App\SharedKernels\Events\ErrorEvent;

class EventLogFactory extends Factory
{
    protected $model = EventLog::class;

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
            'content' => $event->event->toString(),
        ]);
    }

    public function createFromError(ErrorEvent $event): EventLog
    {
        return $this->create([
            'fqdn' => $event::class,
            'process_id' => $event->processId,
            'event_id' => $event->eventId,
            'dispatch_time' => $event->createdAt,
            'content' => $event->toString(),
        ]);
    }
}
