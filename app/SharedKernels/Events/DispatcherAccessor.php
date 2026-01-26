<?php

namespace App\SharedKernels\Events;

use App\Http\Middlewares\GlobalStore;
use Illuminate\Support\Facades\Log;

class DispatcherAccessor
{
    public function __construct(private GlobalStore $globalStore)
    {
    }

    public function dispatch(Event $event): void
    {
        Log::info('process ' . $this->globalStore->processId . ' : ' . $event::class . ' ' .
            $event->eventId . ' ' . $event->createdAt->format('Y-m-d H:i:s'));

        $event->processId = $this->globalStore->processId;
        event(new EventDispatched($event));

        event($event);
    }
}
