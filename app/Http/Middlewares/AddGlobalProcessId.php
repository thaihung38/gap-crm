<?php

namespace App\Http\Middlewares;

use App\SharedKernels\Utilities\Str;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddGlobalProcessId
{
    public function __construct(private GlobalStore $globalStore)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        $this->globalStore->processId = Str::uuid()->toString();

        return $next($request);
    }
}
