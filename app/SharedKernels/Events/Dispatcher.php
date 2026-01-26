<?php

namespace App\SharedKernels\Events;

use Illuminate\Support\Facades\Facade;

/**
 * @method void dispatch(Event $event)
 */
class Dispatcher extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'DispatcherAccessor';
    }
}
