<?php

namespace App\SharedKernels\DTOs\Recruitment\Candidate;

use App\SharedKernels\DTOs\Dto;
use Date;
use Spatie\LaravelData\Attributes\Validation\Rule;

class EmploymentHistoryDto extends Dto
{
    #[Rule('required', 'integer')]
    public int $candidateId;

    #[Rule('required', 'string', 'max:255')]
    public string $companyName;

    #[Rule('required', 'string', 'max:50')]
    public string $title;

    #[Rule('required', 'string')]
    public string $description;

    #[Rule('required')]
    public Date $startDate;

    public Date $endDate;
}
