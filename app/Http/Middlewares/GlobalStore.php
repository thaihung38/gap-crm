<?php

namespace App\Http\Middlewares;

use Illuminate\Container\Attributes\Singleton;

#[Singleton]
class GlobalStore
{
    public string $processId {
        get {
            return $this->processId ?? '';
        }
    }
}
