<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApI\V1\TaskController;
use App\Http\Controllers\ApI\V1\UserController;
use App\Http\Controllers\ApI\V1\StatusController;
use App\Http\Controllers\ApI\V1\UserTaskController;
use App\Http\Controllers\ApI\V1\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('/users', UserController::class);
        Route::apiResource('/statuses', StatusController::class);
        Route::apiResource('/tasks', TaskController::class);
        Route::apiResource('/usertasks', UserTaskController::class);
    });
});

        
