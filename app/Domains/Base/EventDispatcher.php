<?php

namespace App\Domains\Base;

class EventDispatcher
{
    public static function dispatch(Event $event): void
    {
        $event::dispatch();
    }
}
