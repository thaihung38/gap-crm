<?php

namespace App\Infrastructure\Persistence\Recruitment;

use App\Domains\Recruitment\Aggregates\Candidate;
use App\Domains\Recruitment\Repositories\CandidateRepositoryInterface;
use App\Infrastructure\Persistence\Repository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CandidateRepository extends Repository implements CandidateRepositoryInterface
{
    protected function getModel(): Model|Builder
    {
        return new Candidate();
    }
}
