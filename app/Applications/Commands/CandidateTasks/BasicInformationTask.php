<?php

namespace App\Applications\Commands\CandidateTasks;

use App\Applications\Commands\Task;
use App\Domains\Recruitment\Repositories\CandidateRepositoryInterface;
use App\SharedKernels\DTOs\Recruitment\Candidate\CandidateDto;
use Illuminate\Support\Facades\DB;

class BasicInformationTask extends Task
{
    private CandidateRepositoryInterface $candidateRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function update(CandidateDto $dto): void
    {
        $candidate = $this->candidateRepository->getByIdOrFail($dto->id);

        $candidate->updateFromDto($dto);

        DB::transaction(function() use ($candidate) {
            $this->candidateRepository->save($candidate);
        });
    }
}
