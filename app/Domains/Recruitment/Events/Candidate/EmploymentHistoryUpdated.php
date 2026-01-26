<?php

namespace App\Domains\Recruitment\Events\Candidate;

use App\Domains\Base\DomainEvent;
use app\SharedKernels\DTOs\Recruitment\Candidate\EmploymentHistoryDto;

class EmploymentHistoryUpdated extends DomainEvent
{
    public function __construct(
        public EmploymentHistoryDto $old,
        public EmploymentHistoryDto $new
    ) {
        parent::__construct($old, $new);
    }
}
