<?php

namespace App\Console;

use App\Http\Middlewares\GlobalStore;
use App\SharedKernels\Utilities\Str;
use Illuminate\Console\Command;

class Kernel extends Command
{
    public function __construct(private GlobalStore $globalStore)
    {
        $globalStore->processId = Str::uuid()->toString();

        parent::__construct();
    }
}
