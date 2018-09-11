<?php
/**
 * File: FromName.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service\Factory;

use Todo\Domain\Task;
use Todo\Domain\Task\Exception\InvalidTaskName;
use Todo\Domain\Task\Service\Validation\NameIsUnique;
use Todo\Domain\Task\ValueObject\Name;

/**
 * Class FromName
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Factory
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class FromName
{


	/**
	 * TaskRepository
	 *
	 * @var Task\Service\Repository
	 */
	private $taskRepository;

	/**
	 * FromName constructor
	 *
	 * @param Task\Service\Repository $taskRepository
	 * 
	 */
	public function __construct(Task\Service\Repository $taskRepository)
	{
		$this->taskRepository = $taskRepository;
	}

	/**
	 * Build
	 * @param string $name
	 * @return Task
	 * @throws InvalidTaskName
	 */
	public function build(string $name)
	{
		$nameObject = new Name($name);

		$nameIsUnique = new NameIsUnique($this->taskRepository);
		if(!$nameIsUnique->isSatisfiedBy($name))
		{
			throw new InvalidTaskName("Name must be unique");
		}
		
		$idObject = new Task\ValueObject\Id();
		
		$task = new Task($idObject, $nameObject);
		
		return $task;
	}
	
}