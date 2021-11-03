<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Requests\validateRequest;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\TaskAddedMail;
use App\Mail\WeeklyReminderMail;

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
        return redirect('/task/added/mail');
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

    /**
     * Testing mail
     */
    public function testMail()
    {
        $mail = 'thaethae27399@gmail.com';
        Mail::to($mail)->send(new TestMail);

        dd('Mail Send Successfully !!');
    }

    /**
     * To send mail when new task added 
     */
    public function TaskAddedMail()
    {
        $details = [
            'title' => '[New Task Added]',
            'body' => 'Hey! New task is added and please check tasks to do. '
        ];

        Mail::to('thaethae27399@gmail.com')->send(new TaskAddedMail($details));
        dd("Email is Sent, please check your inbox.");
    }

    /**
     * To send mail for reminder
     */
    public function WeeklyReminderMail()
    {
        $details = [
            'body' => 'Hi there! This is weekly reminder to complete all your tasks.'
        ];

        $weekly = count($this->taskInterface->showTaskList());
        if ($weekly == 7) {
            Mail::to('thaethae27399@gmail.com')->send(new WeeklyReminderMail($details));
            dd("Email is Sent, please check your inbox.");
        } else {
            dd("Not Yet.");
        }
    }
}
