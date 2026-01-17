<?php

namespace App\Domains\Recruitment\Aggregates\Candidate;

use App\Domains\Base\Entity;

/**
 * @property int $candidate_id
 * @property string $company_name
 * @property string $title
 * @property string $description
 * @property \DateTime $start_date
 * @property \DateTime $end_date
 */
class EmploymentHistory extends Entity
{
    protected $fillable = [
        'candidate_id',
        'company_name',
        'title',
        'description',
        'start_date',
        'end_date',
    ];

    public function getValidator(): EmploymentHistoryValidator
    {
        return new EmploymentHistoryValidator($this);
    }
}
