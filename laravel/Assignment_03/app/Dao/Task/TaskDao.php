<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
  /**
   * To search task
   */
  public function searchTask($request)
  {
    $task_name = $request->get('name');
    $start_date = $request->get('start');
    $end_date = $request->get('end');

    $tasks = DB::select( DB::raw("SELECT * FROM tasks WHERE name = '$task_name' AND created_at >= '$start_date.00:00:00' AND created_at <= '$end_date.23:59:59'"));
    return $tasks;
  }
}
