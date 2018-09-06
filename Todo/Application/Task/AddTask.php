<?php
/**
 * File: AddTask.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Application\Task;

use function strtolower;
use Todo\Application\Exception\ImpoliteNameException;
use Todo\Domain\Entity\Task;
use Todo\Domain\Exception\Task\InvalidNameException;
use Todo\Domain\Service\Repository\TaskRepositoryInterface;
use TypeError;

/**
 * Class AddTask
 *
 * @category None
 * @package  Todo\Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class AddTask
{
	/**
	 * TaskRepository
	 *
	 * @var TaskRepositoryInterface
	 */
	private $taskRepository;

	/**
	 * AddTask constructor
	 *
	 * @param TaskRepositoryInterface $taskRepository
	 *
	 */
	public function __construct(TaskRepositoryInterface $taskRepository)
	{
		$this->taskRepository = $taskRepository;
	}


	/**
	 * AddTaskWithName
	 * @param string $name
	 * @throws ImpoliteNameException
	 * @throws TypeError
	 * @throws InvalidNameException
	 * @return void
	 */
	public function addTaskWithName(string $name)
	{
		$this->validateTaskName($name);
		
		$task = Task::createWithName($name);
		
		$this->taskRepository->save($task);
	}

	/**
	 * ValidateTaskName
	 * @param string $name
	 * @return void
	 */
	private function validateTaskName(string $name)
	{
		if(
			strpos(strtolower($name), "fuck")
		)
		{
			throw new ImpoliteNameException("soo impolite language");
		}
	}
	
}