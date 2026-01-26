<?php

namespace App\Applications\Orchestration\Handlers;

use App\Domains\Base\DomainEvent;

interface EventHandler
{
    public function handle(DomainEvent $event): void;
}
