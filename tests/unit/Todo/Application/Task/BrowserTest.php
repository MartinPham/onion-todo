<?php
/**
 * File: BrowserTest.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace tests\unit\Todo\Application\Task;

use function get_class;
use function is_array;
use Todo\Application\Task\Browser;
use Todo\Domain\Task;
use Todo\Domain\Task\Service\Repository;

/**
 * Class BrowserTest
 *
 * @category None
 * @package  tests\unit\Todo\Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class BrowserTest extends \Codeception\Test\Unit
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
	public function testGetAllTasks()
	{
		$task = Task::fromData(new Task\ValueObject\Name("test"), new Task\ValueObject\Id("id"));
		
		$taskRepository = $this->makeEmpty(
			Repository::class,
			[
				'findAll' => function() use ($task)
				{
					return [$task];
				}
			]
		);
		
		$taskBrowser = new Browser($taskRepository);
		
		/** @var Task[] $tasks */
		$tasks = $taskBrowser->getAllTasks();
		$this->assertTrue(is_array($tasks));
		$this->assertNotNull($tasks[0]);
		$this->assertInstanceOf(Task::class, $tasks[0]);
		$this->assertEquals($task->getId(), $tasks[0]->getId());
		$this->assertEquals($task->getName(), $tasks[0]->getName());
	}
}