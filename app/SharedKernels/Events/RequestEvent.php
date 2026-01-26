<?php

namespace App\SharedKernels\Events;

use App\SharedKernels\DTOs\RequestDto;
use App\SharedKernels\Utilities\Str;

class RequestEvent extends Event
{
    public function __construct(private RequestDto $request)
    {
        parent::__construct($request);
    }

    public function toString(): string
    {
        return Str::toJson([
            'method' => $this->request->method,
            'path' => $this->request->path,
            'data' => $this->request->data ?? [],
        ]);
    }
}
