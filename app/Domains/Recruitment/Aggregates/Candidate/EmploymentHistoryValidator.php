<?php

namespace App\Domains\Recruitment\Aggregates\Candidate;

use App\Domains\Base\Entity;
use App\Domains\Base\Validator;

class EmploymentHistoryValidator extends Validator
{
    protected Entity|EmploymentHistory $entity;

    public function __construct(EmploymentHistory $employmentHistory)
    {
        $this->entity = $employmentHistory;
    }

    public function validate(): void
    {
        // TODO: Implement validate() method.
    }
}
