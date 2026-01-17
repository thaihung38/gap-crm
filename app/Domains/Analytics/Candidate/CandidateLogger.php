<?php

namespace App\Domains\Analytics\Candidate;

use App\SharedKernels\DTOs\Candidate\CandidateDto;
use App\SharedKernels\DTOs\Candidate\EmploymentHistoryDto;

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
