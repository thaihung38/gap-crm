<?php

namespace App\SharedKernels\Exceptions;

use App\SharedKernels\Events\Dispatcher;
use Illuminate\Http\JsonResponse;
use Throwable;

class ExceptionHandler extends \Illuminate\Foundation\Exceptions\Handler
{
    public function report(\Throwable $e): void
    {
        Dispatcher::dispatchError($e);

        parent::report($e);
    }

    public function render($request, Throwable $e)
    {
        return new JsonResponse(['message' => $e->getMessage()], 500);
    }
}
