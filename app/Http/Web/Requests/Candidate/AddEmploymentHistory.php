<?php

namespace App\Http\Web\Requests\Candidate;

use App\Http\Web\Requests\JsonRequest;

class AddEmploymentHistory extends JsonRequest
{
    public function rules(): array
    {
        return [
            'candidate_id' => 'required|integer',
            'company_name' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
        ];
    }
}
