<?php
/**
 * File: RemoverTest.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace tests\unit\Todo\Application\Task;

use Todo\Application\Task\Editor;
use Todo\Application\Task\Remover;
use Todo\Domain\Task;
use Todo\Domain\Task\Service\Repository;

/**
 * Class RemoverTest
 *
 * @category None
 * @package  tests\unit\Todo\Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class RemoverTest extends \Codeception\Test\Unit
{
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	protected function _before()
	{
	}

	protected function _after()
	{
	}

	// tests
	public function testRemoveTask()
	{
		$id = "id";
		$name = "Task " . rand();
		$taskRepository = $this->makeEmpty(
			Repository::class,
			[
				'find' => function () use ($name, $id)
				{
					return Task::fromData(new Task\ValueObject\Name($name), new Task\ValueObject\Id($id));
				}
			]
		);



		$taskRemover = new Remover($taskRepository);
		$taskRemover->removeTaskFromId(new Task\ValueObject\Id($id));
	}

}