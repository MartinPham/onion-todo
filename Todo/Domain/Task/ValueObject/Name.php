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

use Todo\Domain\Task\Exception\InvalidTaskName;
use Todo\Domain\Task\Service\Validation\NameIsNonEmptyString;
use Todo\Domain\Task\Service\Validation\NameIsPolite;

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
	 * @throws InvalidTaskName
	 */
	public function __construct(string $name)
	{
		$nameIsNonEmptyString = new NameIsNonEmptyString();
		if(!$nameIsNonEmptyString->isSatisfiedBy($name))
		{
			throw new InvalidTaskName("Name must be non empty string");
		}
		
		$nameIsPolite = new NameIsPolite();
		if(!$nameIsPolite->isSatisfiedBy($name))
		{
			throw new InvalidTaskName("Task name is very impolite");
		}
		
		$this->name = $name;
	}

	/**
	 * Get Name
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}


}