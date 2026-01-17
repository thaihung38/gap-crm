<?php

namespace App\Domains\Recruitment\Events\Candidate;

use App\Domains\Base\Event;
use App\Domains\Recruitment\Aggregates\Candidate\EmploymentHistory;
use App\SharedKernels\DTOs\Candidate\EmploymentHistoryDto;

class EmploymentHistoryRemoved extends Event
{
    public function __construct(
        public EmploymentHistory $employmentHistory
    ) {
        parent::__construct();
    }
}
