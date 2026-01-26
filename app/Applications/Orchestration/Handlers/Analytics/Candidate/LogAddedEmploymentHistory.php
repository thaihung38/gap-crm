<?php

namespace App\Applications\Orchestration\Handlers\Analytics\Candidate;

use App\Applications\Orchestration\Handlers\EventHandler;
use App\Domains\Analytics\Candidate\CandidateLogger;
use App\Domains\Base\DomainEvent;
use App\Domains\Recruitment\Events\Candidate\EmploymentHistoryAdded;
use app\SharedKernels\DTOs\Recruitment\Candidate\EmploymentHistoryDto;

class LogAddedEmploymentHistory implements EventHandler
{
    private CandidateLogger $logger;

    public function __construct(CandidateLogger $logger)
    {
        $this->logger = $logger;
    }

    public function handle(DomainEvent|EmploymentHistoryAdded $event): void
    {
        $this->logger->logNewEmploymentHistory(EmploymentHistoryDto::from($event->employmentHistory));
    }
}
