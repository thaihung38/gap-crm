<?php

namespace App\Applications\Queries;

use App\Domains\Recruitment\Aggregates\Candidate;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\QueryBuilder;

class CandidateQuery
{
    public function list(int $size = 10): Paginator
    {
        return QueryBuilder::for(Candidate::class)
            ->allowedFilters(['name', 'email'])
            ->paginate($size);
    }

    public function get(int $id)
    {
        return QueryBuilder::for(Candidate::class)
            ->where('id', $id)
            ->first();
    }
}
