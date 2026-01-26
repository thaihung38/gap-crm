<?php

namespace App\SharedKernels\Exceptions;

use App\SharedKernels\Events\Event;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExceptionEvent extends Event implements ShouldQueue
{
    public string $connection = 'sqs';

    public string $queue = 'exceptions';

    public \Throwable $throwable;

    public function __construct(\Throwable $throwable)
    {
        $this->throwable = $throwable;

        parent::__construct($throwable);
    }
}
