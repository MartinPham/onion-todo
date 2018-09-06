<?php
declare(strict_types=1);

namespace Todo\Domain\Entity;

use function is_string;
use Todo\Domain\Exception\Task\InvalidNameException;

/**
 * File: Task.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */


/**
 * Class Task
 *
 * @category None
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Task
{
	/**
	 * Uuid
	 *
	 * @var string
	 */
	private $uuid;

	/**
	 * Name
	 *
	 * @var string
	 */
	private $name;

	
	public static function createWithName($name)
	{
		return new self(uniqid("task_"), $name);
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 * Task constructor
	 *
	 *
	 */
	private function __construct($uuid, $name)
	{
		$this->setUuid($uuid);
		$this->setName($name);
	}

	/**
	 * Get Uuid
	 *
	 * @return string
	 */
	public function getUuid()
	{
		return $this->uuid;
	}

	/**
	 * Set Uuid
	 *
	 * @param string $uuid Uuid
	 *
	 * @return void
	 */
	private function setUuid($uuid)
	{
		$this->uuid = $uuid;
	}

	/**
	 * Get Name
	 *
	 * @return string
	 */
	public function getName()
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
	private function setName(string $name)
	{
		if(!is_string($name))
		{
			throw new InvalidNameException("Invalid name");
		}
		if($name === '')
		{
			throw new InvalidNameException("Empty name");
		}
		$this->name = $name;
	}
	
	
}