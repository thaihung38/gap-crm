<?php

namespace App\Domains\Recruitment\Factories\Candidates;

use App\Domains\Base\Factory;
use App\Domains\Recruitment\Aggregates\Candidate;

class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition(): array
    {
        return [
            'email' => fake()->email(),
            'name' => fake()->name(),
        ];
    }
}
