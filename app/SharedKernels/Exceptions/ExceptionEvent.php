<?php

namespace App\SharedKernels\Exceptions;

use App\SharedKernels\Events\Event;

class ExceptionEvent extends Event
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
