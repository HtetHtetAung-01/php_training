<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
  /**
   * task dao
   */
  private $taskDao;
  /**
   * Class Constructor
   * @param TaskDaoInterface
   * @return
   */
  public function __construct(TaskDaoInterface $taskDao)
  {
    $this->taskDao = $taskDao;
  }
  public function showTaskList()
  {
    return $this->taskDao->showTaskList();
  }

  /**
   * To add new task
   */
  public function addNewTask($request)
  {
    return $this->taskDao->addNewTask($request);
  }

  /**
   * To delete existing task
   */
  public function deleteTask($id)
  {
    return $this->taskDao->deleteTask($id);
  }
}
