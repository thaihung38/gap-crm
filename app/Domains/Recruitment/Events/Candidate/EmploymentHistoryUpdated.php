<?php

namespace App\Domains\Recruitment\Events\Candidate;

use App\Domains\Base\Event;
use App\Domains\Recruitment\Aggregates\Candidate\EmploymentHistory;
use App\SharedKernels\DTOs\Candidate\EmploymentHistoryDto;

class EmploymentHistoryUpdated extends Event
{
    public function __construct(
        public EmploymentHistoryDto $old,
        public EmploymentHistoryDto $new
    ) {
        parent::__construct();
    }
}
