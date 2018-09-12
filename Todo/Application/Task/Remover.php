<?php
/**
 * File: Remover.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Application\Task;

use Todo\Domain\Task\Service\Repository;
use Todo\Domain\Task\ValueObject\Id;
use function var_dump;

/**
 * Class Remover
 *
 * @category None
 * @package  Todo\Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Remover
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
	 * RemoveTaskFromId
	 * @param Id $id
	 * @return void
	 * @throws \Todo\Domain\Task\Exception\TaskNotFoundException
	 */
	public function removeTaskFromId(Id $id)
	{
		$task = $this->taskRepository->find($id);
		
		
		$this->taskRepository->remove($task);
	}
}