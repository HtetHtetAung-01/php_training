<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface TaskServiceInterface
{
  /**
   * To show task
   */
  public function showTaskList();

  /**
   * To add new task
   */
  public function addNewTask(Request $request);

  /**
   * To delete existing task
   */
  public function deleteTask($id);
}
