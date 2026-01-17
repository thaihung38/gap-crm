<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'candidate',
], function ($router): void {
    Route::get('status', [IndexController::class, 'status']);
});
