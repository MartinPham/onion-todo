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
use Todo\Domain\Task\Exception\DuplicateTaskException;
use Todo\Domain\Task\Service\Factory\FromName;
use Todo\Domain\Task\Service\Repository;
use Todo\Domain\Task\ValueObject\Name;
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
	 * @var Repository
	 */
	private $taskRepository;


	/**
	 * AddTask constructor
	 *
	 * @param Repository $taskRepository
	 *
	 */
	public function __construct(Repository $taskRepository)
	{
		$this->taskRepository = $taskRepository;
	}

	/**
	 * AddTaskWithName
	 * @param string $name
	 * @return void
	 * @throws \Todo\Domain\Task\Exception\InvalidNameException
	 * @throws DuplicateTaskException
	 */
	public function addTaskWithName(string $name)
	{
		$nameObject = new Name($name);
		
		$task = \Todo\Domain\Task::fromName($nameObject);
		
		
		$this->taskRepository->save($task);
	}

}