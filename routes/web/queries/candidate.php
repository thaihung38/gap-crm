<?php

use App\Http\Web\Controllers\Candidate\CandidateController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'candidate',
], function ($router): void {
    Route::get('list', [CandidateController::class, 'list']);
});
