<?php

use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TaskController::class, 'showTaskList']);
Route::post('/task', [TaskController::class, 'addNewTask']);
Route::delete('/task/{id}', [TaskController::class, 'deleteTask']);
