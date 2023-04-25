<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\StatusController;
use App\Http\Controllers\Api\V1\UserTaskController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\Api\V1\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum', 'admin'])->group(function () {

        Route::get('/user', [AuthController::class, 'getUser']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);

        // Dashboard Routes
        Route::get('/dashboard/active-users', [DashboardController::class, 'tasksByUser']);
        Route::get('/dashboard/active-tasks', [DashboardController::class, 'activeTasks']);
        Route::get('/dashboard/completed-tasks', [DashboardController::class, 'completedTasks']);
        Route::get('/dashboard/overdue-tasks', [DashboardController::class, 'overdueTasks']);
        Route::get('/dashboard/latest-tasks', [DashboardController::class, 'latestTasks']);
        Route::get('/dashboard/tasks-by-status', [DashboardController::class, 'tasksByStatus']);
        // Route::get('/dashboard/tasks-by-assignee', [DashboardController::class, 'tasksByAssignee']);

        // User, Statuses, Tasks, $ UserTasks Routes
        Route::apiResource('/users', UserController::class);
        Route::apiResource('/status', StatusController::class);
        Route::apiResource('/tasks', TaskController::class);
        Route::apiResource('/usertasks', UserTaskController::class);

        // Report routes
        Route::get('/reports/tasks-by-day', [ReportController::class, 'tasksByDay']);
        Route::get('/reports/tasks-by-status', [ReportController::class, 'tasksByStatus']);
        Route::get('/reports/tasks-by-user', [ReportController::class, 'tasksByUser']);
    });
});
