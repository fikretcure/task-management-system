<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserTaskController;
use Illuminate\Support\Facades\Route;


Route::middleware(\App\Http\Middleware\ApiAuthMiddleware::class)->name('api')->group(function () {
    Route::middleware(\App\Http\Middleware\ApiUserMiddleware::class)->group(function () {
        Route::put('/tasks/complete/{id}', [TaskController::class, 'complete'])->name('tasks.complete');
        Route::resource('tasks', TaskController::class);
    });

    Route::apiResource('users-tasks', UserTaskController::class);
});
