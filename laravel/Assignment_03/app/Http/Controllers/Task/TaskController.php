<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Requests\validateRequest;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
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
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    /**
     * To add new task
     */
    public function addNewTask(validateRequest $request)
    {
        $validated = $request->validated();
        $this->taskInterface->addNewTask($request);
        return redirect('/');
    }

    /**
     * To update existing task
     */
    public function getTask($id)
    {
        $task = $this->taskInterface->getTask($id);
        return view('update', [
            'task' => $task
        ]);
    }

    public function updateTask(validateRequest $request, $id)
    {
        $validated = $request->validated();
        $this->taskInterface->updateTask($request, $id);
        return redirect('/');
    }
    /**
     * To delete existing task
     */
    public function deleteTask($id)
    {
        $this->taskInterface->deleteTask($id);
        return redirect('/');
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
