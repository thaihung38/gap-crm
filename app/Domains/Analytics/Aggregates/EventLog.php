<?php

namespace App\Domains\Analytics\Aggregates;

use App\Domains\Analytics\Aggregates\EventLog\EventLogRelations;
use App\Domains\Base\Entity;

class EventLog extends Entity
{
    use EventLogRelations;
}
