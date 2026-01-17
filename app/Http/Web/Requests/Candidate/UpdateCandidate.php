<?php

namespace App\Http\Web\Requests\Candidate;

use App\Http\Web\Requests\JsonRequest;

class UpdateCandidate extends JsonRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer'
        ];
    }
}
