<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Task\TaskAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/task/list',  [TaskAPIController::class, 'showTaskList']);
Route::post('/task/create', [TaskAPIController::class, 'addNewTask']);

Route::get('/task/{id}', [TaskAPIController::class, 'getTask']);
Route::post('/task/edit/{id}', [TaskAPIController::class, 'updateTask']);

Route::delete('/task/delete/{id}', [TaskAPIController::class, 'deleteTask']);
