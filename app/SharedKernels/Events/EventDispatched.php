<?php

namespace App\SharedKernels\Events;

class EventDispatched extends Event
{
    public function __construct(public Event $event)
    {
        parent::__construct($event);
    }
}
