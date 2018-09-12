<?php
/**
 * File: Task.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain;

use Todo\Domain\Task\TaskData;
use Todo\Domain\Task\ValueObject\Id;
use Todo\Domain\Task\ValueObject\Name;

/**
 * Class Task
 *
 * @category None
 * @package  Todo\Domain
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Task
{
	/**
	 * Id
	 *
	 * @var Id
	 */
	private $id;
	
	/**
	 * Name
	 *
	 * @var Name
	 */
	private $name;

	/**
	 * Task constructor
	 *
	 * @param null|Id $id
	 * 
	 */
	private function __construct(?Id $id = null)
	{
		if($id !== null)
		{
			$this->id = $id;
		} else {
			$this->id = new Id();
		}
	}

	/**
	 * Get Id
	 *
	 * @return Id
	 */
	public function getId(): Id
	{
		return $this->id;
	}

	/**
	 * Get Name
	 *
	 * @return Name
	 */
	public function getName(): Name
	{
		return $this->name;
	}

	/**
	 * Set Name
	 *
	 * @param Name $name Name
	 *
	 * @return void
	 */
	public function setName(Name $name)
	{
		$this->name = $name;
	}

	
	public static function constructFromName(Name $name)
	{
		return self::constructFromData($name);
	}

	/**
	 * ConstructFromData
	 * @param null|Id $id
	 * @param Name $name
	 * @return Task
	 */
	public static function constructFromData(Name $name, ?Id $id = null)
	{
		$task = new self($id);
		$task->setName($name);
		
		return $task;
	}

	public function equals(Task $task)
	{
		return (
			$this->getId()->equals($task->getId())
			&& $this->getName()->equals($task->getName())
		);
	}
}