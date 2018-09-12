<?php
/**
 * File: Editor.phpphp - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Application\Task;

use function strtolower;
use Todo\Application\Task\DataTransferObject\TaskData;
use Todo\Domain\Task;
use Todo\Domain\Task\Exception\DuplicateTaskException;
use Todo\Domain\Task\Service\Repository;
use Todo\Domain\Task\ValueObject\Id;
use Todo\Domain\Task\ValueObject\Name;
use TypeError;
use function var_dump;

/**
 * Class Editor
 *
 * @category None
 * @package  Todo\Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Editor
{
	/**
	 * TaskRepository
	 *
	 * @var Repository
	 */
	private $taskRepository;


	/**
	 * Editor constructor
	 *
	 * @param Repository $taskRepository
	 *
	 */
	public function __construct(Repository $taskRepository)
	{
		$this->taskRepository = $taskRepository;
	}

	/**
	 * CreateTaskWithName
	 * @param string $name
	 * @return Task
	 * @throws DuplicateTaskException
	 * @throws \Todo\Domain\Task\Exception\InvalidNameException
	 */
	public function createTaskWithName(string $name)
	{
		$nameObject = new Name($name);
		
		$task = \Todo\Domain\Task::fromName($nameObject);
		
		
		$this->taskRepository->save($task);
		
		return $task;
	}

	/**
	 * UpdateTaskWithData
	 * @param Id $id
	 * @param TaskData $taskData
	 * @return Task
	 * @throws DuplicateTaskException
	 * @throws \Todo\Domain\Task\Exception\InvalidNameException
	 * @throws \Todo\Domain\Task\Exception\TaskNotFoundException
	 */
	public function updateTaskWithData(Id $id, TaskData $taskData)
	{
		$task = $this->taskRepository->find($id);
		
		$nameObject = new Name($taskData->getName());
		$task->setName($nameObject);
		
		$this->taskRepository->save($task);
		
		return $task;
	}

}