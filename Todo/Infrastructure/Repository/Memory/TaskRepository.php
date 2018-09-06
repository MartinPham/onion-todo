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

use Todo\Domain\Entity\Task;
use Todo\Domain\Service\Repository\TaskRepositoryInterface;

/**
 * Class TaskRepository
 *
 * @category None
 * @package  Todo\Infrastructure\Repository\Memory
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class TaskRepository implements TaskRepositoryInterface
{

	/**
	 * TaskRepository constructor
	 *
	 *
	 */
	public function __construct()
	{
	}

	public function findAll(): array
	{
		return $GLOBALS['tasks'] ?? [];
	}


	public function save(Task $task)
	{
		$GLOBALS['tasks'][] = $task;
	}

}