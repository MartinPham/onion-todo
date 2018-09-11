<?php
/**
 * File: NameIsUnique.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service\Validation;

use Todo\Domain\Task\Exception\TaskNotFound;
use Todo\Domain\Task\Service\Repository;
use Todo\Domain\Task\Service\Validation\Specification\NameSpecification;
use Todo\Domain\Task\ValueObject\Name;

/**
 * Class NameIsUnique
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class NameIsUnique implements NameSpecification
{
	/**
	 * TaskRepository
	 *
	 * @var Repository
	 */
	private $taskRepository;

	/**
	 * NameIsUnique constructor
	 *
	 * @param Repository $taskRepository
	 *
	 */
	public function __construct(Repository $taskRepository)
	{
		$this->taskRepository = $taskRepository;
	}


	public function isSatisfiedBy(string $name): bool
	{
		try {
			$this->taskRepository->findByName($name);
		} catch (TaskNotFound $exception)
		{
			return true;
		}
		
		return false;
		
	}

}