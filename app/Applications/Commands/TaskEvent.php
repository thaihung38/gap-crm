<?php

namespace App\Applications\Commands;

use App\SharedKernels\Utilities\Str;
use DateTime;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $connection = 'sqs';

    public $queue = 'tasks';

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

    protected string $action;

    protected array $data;

    public function __construct(string $action, array $data = [])
    {
        $this->createdAt = new DateTime();
        $this->eventId = Str::uuid7()->toString();
        $this->action = $action;
        $this->data = $data;
    }
}
