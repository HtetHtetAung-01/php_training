<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Requests\validateRequest;

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
     * @param PostCreateRequest $request Request form new task create
     * @return View task add view
     */
    public function addNewTask(validateRequest $request)
    {
        $validated = $request->validated();
        $this->taskInterface->addNewTask($request);
        return redirect('/');
    }
    public function deleteTask($id)
    {
        $this->taskInterface->deleteTask($id);
        return redirect('/');
    }
}
