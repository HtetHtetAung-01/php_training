<?php

use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Report\ReportController;
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
Route::post('/update/{id}', [TaskController::class, 'getTask']);
Route::post('/updateTaskValue/{id}', [TaskController::class, 'updateTask']);

Route::delete('/task/{id}', [TaskController::class, 'deleteTask']);

Route::get('export', [TaskController::class, 'export'])->name('export');
Route::get('importExportView', [TaskController::class, 'importExportView']);
Route::post('import', [TaskController::class, 'import'])->name('import');

Route::get('report', [ReportController::class, 'showReport']);
Route::post('report/add', [ReportController::class, 'addReport']);
Route::delete('report/{id}', [ReportController::class, 'deleteReport']);

Route::get('/search', [TaskController::class, 'searchTask']);