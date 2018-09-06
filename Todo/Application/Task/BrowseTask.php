<?php
/**
 * File: BrowseTask.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Application\Task;

use Todo\Domain\Service\Repository\TaskRepositoryInterface;

/**
 * Class BrowseTask
 *
 * @category None
 * @package  Todo\Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class BrowseTask
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
	 * BrowseTaskList
	 * @return array|\Todo\Domain\Entity\Task[]
	 */
	public function browseTaskList()
	{
		return $this->taskRepository->findAll();
	}
}