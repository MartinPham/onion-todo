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

	public function find(Task\ValueObject\Id $id): Task
	{
		/** @var Task $task */
		foreach($GLOBALS['tasks'] as $task)
		{
			if($task->getId()->equals($id))
			{
				return $task;
			}
		}
		
		throw new Task\Exception\TaskNotFoundException("");
	}

	public function findByName(Task\ValueObject\Name $name): Task
	{
		/** @var Task $task */
		foreach($GLOBALS['tasks'] as $task)
		{
			if($task->getName()->equals($name))
			{
				return $task;
			}
		}

		throw new Task\Exception\TaskNotFoundException("");
	}


	public function save(Task $task)
	{
		$taskNameIsAlreadyUsed = false;
		
		try {
			$existedTaskWithSameName = $this->findByName($task->getName());
			
			if($existedTaskWithSameName->getId() !== $task->getId())
			{
				$taskNameIsAlreadyUsed = true;
			}
		} catch (Task\Exception\TaskNotFoundException $exception)
		{
			
		}
		
		if($taskNameIsAlreadyUsed)
		{
			throw new Task\Exception\DuplicateTaskException("Task name " . $task->getName() . " is already used");
		}
		
		$GLOBALS['tasks'][] = $task;
	}

}