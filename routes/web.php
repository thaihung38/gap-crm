<?php

use Illuminate\Support\Facades\Route;

Route::get('test', [\App\Http\Web\Controllers\TestController::class, 'test']);
