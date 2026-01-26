<?php

namespace App\Domains\Recruitment\Factories\Candidates;

use App\Domains\Base\Factory;
use App\Domains\Recruitment\Aggregates\Candidate\EmploymentHistory;
use App\SharedKernels\DTOs\Recruitment\Candidate\EmploymentHistoryDto;

/**
 * @method EmploymentHistory createFrom(EmploymentHistoryDto $dto)
 */
class EmploymentHistoryFactory extends Factory
{
    protected $model = EmploymentHistory::class;

    public function definition(): array
    {
        return [
            'company_name' => fake()->company,
            'title' => fake()->jobTitle,
        ];
    }
}
