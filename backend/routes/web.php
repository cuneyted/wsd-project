<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Laravel backend is working',
        'project' => 'Web Systems Design Project 1'
    ]);
});