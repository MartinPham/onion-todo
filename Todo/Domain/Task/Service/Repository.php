<?php
/**
 * File: Repository.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service;

use Todo\Domain\Task;
use Todo\Domain\Task\ValueObject\Id;

/**
 * Interface Repository
 *
 * @category None
 * @package  Todo\Domain\Task\Service
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
interface Repository
{
	/**
	 * Find
	 * @param $id
	 * @return Task
	 * @throws Task\Exception\TaskNotFound
	 */
	public function find($id): Task;

	/**
	 * FindByName
	 * @param $name
	 * @return Task
	 * @throws Task\Exception\TaskNotFound
	 */
	public function findByName($name): Task;

	/**
	 * Save
	 * @param Task $task
	 * @return mixed
	 * @throws Task\Exception\DuplicatedTaskName
	 */
	public function save(Task $task);
}