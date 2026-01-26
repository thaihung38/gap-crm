<?php

namespace App\SharedKernels\Events;

class ErrorEvent extends Event
{
    public function __construct(public \Throwable $throwable)
    {
        parent::__construct($throwable);
    }

    public function toString(): string
    {
        return $this->throwable->getMessage() . PHP_EOL . $this->throwable->getTraceAsString();
    }
}
