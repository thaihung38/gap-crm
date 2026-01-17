<?php

namespace App\Applications\Orchestration\Handlers;

use App\Domains\Base\Event;

interface EventHandler
{
    public function handler(Event $event): void;
}
