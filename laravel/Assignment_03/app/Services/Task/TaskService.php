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
   * To get task by id
   */
  public function getTask($id)
  {
    return $this->taskDao->getTask($id);
  }

  /**
   * To update existing task
   */
  public function updateTask($request, $id)
  {
    return $this->taskDao->updateTask($request, $id);
  }

  /**
   * To delete existing task
   */
  public function deleteTask($id)
  {
    return $this->taskDao->deleteTask($id);
  }
  
  /**
   * To search task
   */
  public function searchTask($request)
  {
    $tasks = $this->taskDao->searchTask($request);
    return $tasks;
  }
}
