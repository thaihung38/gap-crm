<?php

namespace App\Domains\Base;

use App\SharedKernels\Utilities\Str;
use DateTime;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected DateTime $createdAt {
        get {
            return $this->createdAt;
        }
    }

    protected string $eventId {
        get {
            return $this->eventId;
        }
    }

    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->eventId = Str::uuid7()->toString();
    }
}
