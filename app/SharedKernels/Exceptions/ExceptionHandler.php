<?php

namespace App\SharedKernels\Exceptions;

class ExceptionHandler
{
    public static function report(\Throwable $exception): void
    {
//        ExceptionEvent::dispatch($exception);
    }
}
