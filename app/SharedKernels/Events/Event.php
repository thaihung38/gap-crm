<?php

namespace App\SharedKernels\Events;

use App\SharedKernels\Utilities\Str;
use DateTime;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

abstract class Event
{
    use Dispatchable, InteractsWithSockets;

    public DateTime $createdAt;

    public string $processId {
        get {
            return $this->processId ?? '';
        }
    }

    public string $eventId;

    public array $arguments;

    public function __construct(...$args)
    {
        $this->createdAt = new DateTime();
        $this->eventId = Str::uuid7()->toString();
        $this->arguments = $args;
    }

    public function toString(): string
    {
        return '';
    }
}
