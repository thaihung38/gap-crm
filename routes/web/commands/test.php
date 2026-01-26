<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['dispatchRequestEvent'],
], function ($router): void {
    Route::post('test', [\App\Http\Web\Controllers\TestController::class, 'testPost']);
});
