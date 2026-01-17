<?php

namespace App\Domains\Recruitment\Aggregates;

use App\Domains\Base\Entity;
use App\Domains\Base\EventDispatcher;
use App\Domains\Recruitment\Aggregates\Candidate\CandidateRelations;
use App\Domains\Recruitment\Aggregates\Candidate\EmploymentHistory;
use App\Domains\Recruitment\Events\Candidate\EmploymentHistoryAdded;
use App\Domains\Recruitment\Events\Candidate\EmploymentHistoryRemoved;
use App\Domains\Recruitment\Events\Candidate\EmploymentHistoryUpdated;
use App\Domains\Recruitment\Factories\Candidates\EmploymentHistoryFactory;
use App\SharedKernels\DTOs\Candidate\EmploymentHistoryDto;
use App\SharedKernels\Exceptions\Exception;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Candidate extends Entity
{
    use CandidateRelations;
    use HasUuids;

    public function addEmploymentHistory(EmploymentHistoryDto $dto): EmploymentHistory
    {
        $emp = EmploymentHistoryFactory::createFrom($dto);

        EventDispatcher::dispatch(new EmploymentHistoryAdded($emp));

        return $emp;
    }

    public function updateEmploymentHistory(EmploymentHistoryDto $dto): ?EmploymentHistory
    {
        $emp = $this->employmentHistories()->where(EmploymentHistory::ID, $dto->id)->first();

        if (!$emp) throw new Exception(__("Employment history not found."));

        $oldData = EmploymentHistoryDto::from($emp);

        $emp->updateFromDto($dto);

        $this->savingEntities->push($emp);

        $newData = EmploymentHistoryDto::from($emp);

        EventDispatcher::dispatch(new EmploymentHistoryUpdated($oldData, $newData));

        return $emp;
    }

    public function removeEmploymentHistory(int $id): void
    {
        $emp = $this->employmentHistories()->where(EmploymentHistory::ID, $id)->first();

        if (!$emp) throw new Exception(__("Employment history not found."));

        $this->deletingEntities->push($emp);

        EventDispatcher::dispatch(new EmploymentHistoryRemoved($emp));
    }
}
