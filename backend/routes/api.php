<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\HealthController;
use Illuminate\Support\Facades\Route;

Route::get('/health', HealthController::class);

Route::prefix('78745/v1')->group(function () {
    Route::apiResource('tasks', TaskController::class);
});