<?php

namespace App\Http\Controllers\API\Task;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\validateRequest;
use Illuminate\Http\JsonResponse;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Maatwebsite\Excel\Facades\Excel;

class TaskAPIController extends Controller
{
    /**
     * task interface
     */
    private $taskInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }
    /**
     * To show task lisk
     * 
     * @return View Task lisk
     */
    public function showTaskList()
    {
        $tasks = $this->taskInterface->showTaskList();
        return response()->json($tasks);
    }
    /**
     * To add new task
     */
    public function addNewTask(validateRequest $request)
    {
        $validated = $request->validated();
        $task = $this->taskInterface->addNewTask($request);
        return response()->json($task);
    }

    /**
     * To update existing task
     */
    public function getTask($id)
    {
        $task = $this->taskInterface->getTask($id);
        return response()->json($task);
    }

    public function updateTask(validateRequest $request, $id)
    {
        $validated = $request->validated();
        $task = $this->taskInterface->updateTask($request, $id);
        return response()->json($task);
    }
    /**
     * To delete existing task
     */
    public function deleteTask($id)
    {
        info($id);
        $task = $this->taskInterface->deleteTask($id);
        // return redirect('/');
        // return redirect('/api-show');  
        return response()->json($task);
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new TaskExport, 'tasks.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new TaskImport, request()->file('file'));
        return redirect('/');
    }

    /**
     * To search task
     */
    public function searchTask(Request $request)
    {
        $tasks = $this->taskInterface->searchTask($request);
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
}
