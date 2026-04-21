<?php

use App\Http\Controllers\EchoController;
use Illuminate\Support\Facades\Route;

Route::get('/echo', [EchoController::class, 'echo']);
Route::post('/echo', [EchoController::class, 'echo']);

Route::get('/tasks', [\App\Http\Controllers\Api\TaskController::class, 'index']);
Route::post('/tasks', [\App\Http\Controllers\Api\TaskController::class, 'store']);
Route::get('/tasks/{id}', [\App\Http\Controllers\Api\TaskController::class, 'show']);
Route::put('/tasks/{id}', [\App\Http\Controllers\Api\TaskController::class, 'update']);
Route::patch('/tasks/{id}', [\App\Http\Controllers\Api\TaskController::class, 'update']);
Route::post('/tasks/{id}/update', [\App\Http\Controllers\Api\TaskController::class, 'update']);
Route::delete('/tasks/{id}', [\App\Http\Controllers\Api\TaskController::class, 'destroy']);