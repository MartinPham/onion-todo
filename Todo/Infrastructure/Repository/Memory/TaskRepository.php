<?php
/**
 * File: TaskRepository.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Infrastructure\Repository\Memory;


use Todo\Domain\Task;

/**
 * Class TaskRepository
 *
 * @category None
 * @package  Todo\Infrastructure\Repository\Memory
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class TaskRepository implements Task\Service\Repository
{

	/**
	 * TaskRepository constructor
	 *
	 *
	 */
	public function __construct()
	{
		if(!isset($GLOBALS['tasks']))
		{
			$GLOBALS['tasks'] = [];
		}
	}

	public function find($id): Task
	{
		/** @var Task $task */
		foreach($GLOBALS['tasks'] as $task)
		{
			if($task->getId()->getId() === $id)
			{
				return $task;
			}
		}
		
		throw new Task\Exception\TaskNotFound("");
	}

	public function findByName($name): Task
	{
		/** @var Task $task */
		foreach($GLOBALS['tasks'] as $task)
		{
			if($task->getName()->getName() === $name)
			{
				return $task;
			}
		}

		throw new Task\Exception\TaskNotFound("");
	}


	public function save(Task $task)
	{
		$taskNameIsAlreadyUsed = false;
		
		try {
			$existedTaskWithSameName = $this->findByName($task->getName()->getName());
			
			if($existedTaskWithSameName->getId() !== $task->getId())
			{
				$taskNameIsAlreadyUsed = true;
			}
		} catch (Task\Exception\TaskNotFound $exception)
		{
			
		}
		
		if($taskNameIsAlreadyUsed)
		{
			throw new Task\Exception\DuplicatedTaskName("Task name " . $task->getName()->getName() . " is already used");
		}
		
		$GLOBALS['tasks'][] = $task;
	}

}