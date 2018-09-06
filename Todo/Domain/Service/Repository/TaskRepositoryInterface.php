<?php
/**
 * File: TaskRepositoryInterface.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Service\Repository;

use Todo\Domain\Entity\Task;

/**
 * Interface TaskRepositoryInterface
 *
 * @category None
 * @package  Todo\Domain\Service\Repository
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
interface TaskRepositoryInterface
{
	/**
	 * FindAll
	 * @return Task[]
	 */
	public function findAll(): array;

	/**
	 * Save
	 * @param Task $task
	 * @return mixed
	 */
	public function save(Task $task);
}