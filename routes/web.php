<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware(AuthMiddleware::class)->group(function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::get('/tasks/complete/{id}', [TaskController::class, 'complete'])->name('tasks.complete');
    Route::resource('tasks', TaskController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post.login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
