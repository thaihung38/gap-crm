<?php

namespace App\Domains\Analytics\Candidate;

use app\SharedKernels\DTOs\Recruitment\Candidate\CandidateDto;
use app\SharedKernels\DTOs\Recruitment\Candidate\EmploymentHistoryDto;

class CandidateLogger
{
    public function logNewCandidate(CandidateDto $candidateDto): void
    {
        $candidateDto->jsonSerialize();
    }

    public function logNewEmploymentHistory(EmploymentHistoryDto $employmentHistoryDto): void
    {
        $employmentHistoryDto->jsonSerialize();
    }
}
