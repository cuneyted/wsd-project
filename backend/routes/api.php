<?php

use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\ShortLinkController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/health', HealthController::class);

Route::prefix('78745/v1')->group(function () {
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('short-links', ShortLinkController::class)->only(['index', 'store', 'show']);

    Route::get('restaurants/nearby', [RestaurantController::class, 'nearby']);
    Route::apiResource('restaurants', RestaurantController::class);
});
