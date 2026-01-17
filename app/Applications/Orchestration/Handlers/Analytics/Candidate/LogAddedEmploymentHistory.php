<?php

namespace App\Applications\Orchestration\Handlers\Analytics\Candidate;

use App\Applications\Orchestration\Handlers\EventHandler;
use App\Domains\Analytics\Candidate\CandidateLogger;
use App\Domains\Base\Event;
use App\Domains\Recruitment\Events\Candidate\EmploymentHistoryAdded;
use App\SharedKernels\DTOs\Candidate\EmploymentHistoryDto;

class LogAddedEmploymentHistory implements EventHandler
{
    private CandidateLogger $logger;

    public function __construct(CandidateLogger $logger)
    {
        $this->logger = $logger;
    }

    public function handler(Event|EmploymentHistoryAdded $event): void
    {
        $this->logger->logNewEmploymentHistory(EmploymentHistoryDto::from($event->employmentHistory));
    }
}
