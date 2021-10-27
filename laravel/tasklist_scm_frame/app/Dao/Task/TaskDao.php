<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for post
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
}
