<?php

namespace App\SharedKernels\Events;

use App\Http\Middlewares\GlobalStore;
use App\SharedKernels\Exceptions\ExceptionEvent;

class DispatcherAccessor
{
    public function __construct(private GlobalStore $globalStore)
    {
    }

    public function dispatch(Event $event): void
    {
        $event->processId = $this->globalStore->processId;
        event(new EventDispatched($event));

        event($event);
    }

    public function dispatchError(\Throwable $e): void
    {
        $event = new ExceptionEvent($e);
        $event->processId = $this->globalStore->processId;
        event($event);
    }
}
