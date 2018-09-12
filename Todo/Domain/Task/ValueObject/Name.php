<?php
/**
 * File: Name.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\ValueObject;

use Todo\Domain\Task\Exception\InvalidNameException;

/**
 * Class Name
 *
 * @category None
 * @package  Todo\Domain\Task\ValueObject
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Name
{
	/**
	 * Name
	 *
	 * @var string
	 */
	private $name;

	/**
	 * Name constructor
	 *
	 * @param string $name
	 *
	 * @throws InvalidNameException
	 */
	public function __construct(string $name)
	{
		$nameIsNonEmptyString = new \Todo\Domain\Task\Service\Validation\Name\IsNonEmptyString();
		if(!$nameIsNonEmptyString->isSatisfiedBy($name))
		{
			throw new InvalidNameException("Name must be non empty string");
		}
		
		$nameIsPolite = new \Todo\Domain\Task\Service\Validation\Name\IsPolite();
		if(!$nameIsPolite->isSatisfiedBy($name))
		{
			throw new InvalidNameException("Task name is very impolite");
		}
		
		$this->name = $name;
	}

	public function __toString()
	{
		return $this->name;
	}


	public function equals(Name $name)
	{
		return (string)$name === $this->name;
	}
}