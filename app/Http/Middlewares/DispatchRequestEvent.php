<?php

namespace App\Http\Middlewares;

use App\SharedKernels\DTOs\RequestDto;
use App\SharedKernels\Events\Dispatcher;
use App\SharedKernels\Events\RequestEvent;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DispatchRequestEvent
{
    public function handle(Request $request, Closure $next): Response
    {
        Dispatcher::dispatch(new RequestEvent(RequestDto::from([
            'method' => $request->getMethod(),
            'path' => $request->path(),
            'data' => $request->all(),
        ])));

        return $next($request);
    }
}
