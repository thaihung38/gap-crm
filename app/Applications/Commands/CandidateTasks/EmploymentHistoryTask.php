<?php

namespace App\Applications\Commands\CandidateTasks;

use App\Applications\Commands\Metadata;
use App\Applications\Commands\Task;
use App\Domains\Recruitment\Aggregates\Candidate;
use App\Domains\Recruitment\Repositories\CandidateRepositoryInterface;
use App\SharedKernels\DTOs\Recruitment\Candidate\EmploymentHistoryDto;
use Illuminate\Support\Facades\DB;

class EmploymentHistoryTask extends Task
{
    private CandidateRepositoryInterface $candidateRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function add(EmploymentHistoryDto $dto): Metadata
    {
        /* @var Candidate $candidate */
        $candidate = auth()->user();

        return new Metadata(id: $candidate->addEmploymentHistory($dto)->getKey());
    }

    public function update(EmploymentHistoryDto $dto): void
    {
        /* @var Candidate $candidate */
        $candidate = auth()->user();
        $candidate->updateEmploymentHistory($dto);

        DB::transaction(function() use ($candidate) {
            $this->candidateRepository->save($candidate);
        });
    }

    public function remove(int $id): void
    {
        /* @var Candidate $candidate */
        $candidate = auth()->user();

        $candidate->removeEmploymentHistory($id);

        DB::transaction(function() use ($candidate) {
            $this->candidateRepository->save($candidate);
        });
    }
}
