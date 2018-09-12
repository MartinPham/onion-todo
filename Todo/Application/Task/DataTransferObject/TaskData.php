<?php
/**
 * File: TaskData.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Application\Task\DataTransferObject;

/**
 * Class TaskData
 *
 * @category None
 * @package  Todo\Application\Task\DataTransferObject
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class TaskData
{
	/** @var string */
	private $name;

	/**
	 * Get Name
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Set Name
	 *
	 * @param string $name Name
	 *
	 * @return void
	 */
	public function setName(string $name)
	{
		$this->name = $name;
	}

	

}