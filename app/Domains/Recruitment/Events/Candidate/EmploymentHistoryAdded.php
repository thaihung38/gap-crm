<?php

namespace App\Domains\Recruitment\Events\Candidate;

use App\Domains\Base\Event;
use App\Domains\Recruitment\Aggregates\Candidate\EmploymentHistory;

class EmploymentHistoryAdded extends Event
{
    public function __construct(
        public EmploymentHistory $employmentHistory
    ) {
        parent::__construct();
    }
}
