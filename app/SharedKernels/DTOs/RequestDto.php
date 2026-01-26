<?php

namespace App\SharedKernels\DTOs;

use Spatie\LaravelData\Attributes\Validation\Rule;

class RequestDto extends Dto
{
    #[Rule('required', 'string')]
    public string $method;

    #[Rule('required', 'string')]
    public string $path;

    public ?array $data;
}
