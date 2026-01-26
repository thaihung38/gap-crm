<?php

namespace App\Domains\Recruitment\Events\Candidate;

use App\Domains\Base\DomainEvent;
use App\Domains\Recruitment\Aggregates\Candidate\EmploymentHistory;

class EmploymentHistoryRemoved extends DomainEvent
{
    public function __construct(
        public EmploymentHistory $employmentHistory
    ) {
        parent::__construct($employmentHistory);
    }
}
