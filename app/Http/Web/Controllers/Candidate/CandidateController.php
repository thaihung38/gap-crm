<?php

namespace App\Http\Web\Controllers\Candidate;

use App\Applications\Commands\CandidateTasks\BasicInformationTask;
use App\Applications\Commands\CandidateTasks\EmploymentHistoryTask;
use App\Applications\Queries\CandidateQuery;
use App\Http\Web\Controllers\Controller;
use App\Http\Web\Requests\Candidate\AddEmploymentHistory;
use App\Http\Web\Requests\Candidate\UpdateCandidate;
use App\Http\Web\Resources\Error;
use app\SharedKernels\DTOs\Recruitment\Candidate\CandidateDto;
use app\SharedKernels\DTOs\Recruitment\Candidate\EmploymentHistoryDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    private CandidateQuery $candidateQuery;
    private BasicInformationTask $basicInformationTask;
    private EmploymentHistoryTask $employmentHistoryTask;

    public function __construct(
        CandidateQuery $candidateQuery,
        BasicInformationTask $basicInformationTask,
        EmploymentHistoryTask $employmentHistoryTask
    )
    {
        $this->candidateQuery = $candidateQuery;
        $this->basicInformationTask = $basicInformationTask;
        $this->employmentHistoryTask = $employmentHistoryTask;
    }

    public function list(Request $request): JsonResponse
    {
        return new JsonResponse($this->candidateQuery->list($request->get('size', 10)));
    }

    public function update(UpdateCandidate $request): JsonResponse|Error
    {
        try {
            $this->basicInformationTask->update(CandidateDto::factory()->withoutValidation()->from($request));

            return new JsonResponse();
        } catch (\Throwable $throwable) {
            return new Error($throwable->getMessage(), $throwable->getCode());
        }
    }

    public function addEmploymentHistory(AddEmploymentHistory $request): JsonResponse|Error
    {
        try {
            $result = $this->employmentHistoryTask->add(EmploymentHistoryDto::from($request));

            return new JsonResponse([
                'id' => $result->id
            ]);
        } catch (\Exception $e) {
            return new Error($e->getMessage(), $e->getCode());
        }
    }
}
