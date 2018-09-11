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
	 * @param Id $id
	 * @param Name $name
	 *
	 */
	public function __construct(Id $id, Name $name)
	{
		$this->id = $id;
		$this->name = $name;
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

	

}