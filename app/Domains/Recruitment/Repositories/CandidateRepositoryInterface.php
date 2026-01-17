<?php

namespace App\Domains\Recruitment\Repositories;

use App\Domains\Base\RepositoryInterface;
use App\Domains\Recruitment\Aggregates\Candidate;

/**
 * @method Candidate getByIdOrFail(int $id)
 * @method Candidate getById(int $id)
 * @method Candidate save(int $id)
 */
interface CandidateRepositoryInterface extends RepositoryInterface
{
}
