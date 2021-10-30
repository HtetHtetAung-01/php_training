<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;
use App\Imports\TaskImport;
use App\Exports\TaskExport;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Data accessing object for task
 */
class TaskDao implements TaskDaoInterface
{
  /**
   * Interface for task service
   */
  public function showTaskList()
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return $tasks;
  }

  /**
   * To add new task
   */
  public function addNewTask(Request $request)
  {
    // Create The Task...
    $task = new Task;
    $task->name = $request->name;
    $task->deadline = $request->deadline;
    $task->note = $request->note;
    $task->save();
    return $task;
  }

  /**
   * To get task by id
   */
  public function getTask($id)
  {
    $task = Task::FindorFail($id);
    return $task;
  }

  /**
   * To update existing task
   */

  public function updateTask(Request $request, $id)
  {
    // Update The Task...
    $task = Task::FindorFail($id);
    $task->name = $request->name;
    $task->deadline = $request->deadline;
    $task->note = $request->note;
    $task->save();
    return $task;
  }

  /**
   * To delete existing task
   */
  public function deleteTask($id)
  {
    Task::findOrFail($id)->delete();
  }

  public function fileImport($request)
  {
    $importFile = Excel::import(new TaskImport, $request->file('file')->store('temp'));
    return $importFile;
  }

  /**
   * To export file
   * @return excel file
   */
  public function fileExport()
  {
    $exportFile = Excel::download(new TaskExport, 'tasks.xlsx');
    return $exportFile;
  }
}
