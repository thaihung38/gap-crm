<?php

use App\Http\Web\Controllers\Candidate\CandidateController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'candidate',
], function ($router): void {
    Route::post('update', [CandidateController::class, 'update']);

    Route::group([
        'prefix' => 'employment_history',
    ], function ($router): void {
        Route::post('add', [CandidateController::class, 'addEmploymentHistory']);
    });
});
