<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface TaskDaoInterface
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
