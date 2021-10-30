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
   * To get task by id
   */
  public function getTask($id);

  /**
   * To update existing task
   */
  public function updateTask(Request $request, $id);

  /**
   * To delete existing task
   */
  public function deleteTask($id);

  public function fileImport($request);

  /**
   * To export file
   */
  public function fileExport();
}
