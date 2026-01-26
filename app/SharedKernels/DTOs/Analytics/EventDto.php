<?php

namespace App\SharedKernels\DTOs\Analytics;

use App\SharedKernels\DTOs\Dto;
use Spatie\LaravelData\Attributes\Validation\Rule;

class EventDto extends Dto
{
    #[Rule('required', 'string')]
    public string $fqdn;

    #[Rule('required', 'string')]
    public string $processId;

    #[Rule('required', 'string')]
    public string $eventId;

    #[Rule('required', 'date')]
    public string $dispatchTime;
}
