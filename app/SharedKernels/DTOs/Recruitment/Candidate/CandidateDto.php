<?php

namespace App\SharedKernels\DTOs\Recruitment\Candidate;

use App\SharedKernels\DTOs\Dto;
use Spatie\LaravelData\Attributes\Validation\Rule;

class CandidateDto extends Dto
{
    #[Rule('required', 'string', 'email', 'max:255')]
    public string $email;

    #[Rule('required', 'string')]
    public string $name;
}
