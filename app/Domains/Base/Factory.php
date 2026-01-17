<?php

namespace App\Domains\Base;

use App\SharedKernels\DTOs\Dto;

class Factory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    public function createFrom(Dto $dto): Entity
    {
        return $this->create($dto->toArray());
    }

    public function definition(): array
    {
        return [];
    }
}
