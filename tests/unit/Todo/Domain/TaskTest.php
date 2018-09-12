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

namespace tests\unit\Todo\Domain;

use Todo\Domain\Task;
use Todo\Domain\Task\Exception\InvalidNameException;
use Todo\Domain\Task\Exception\TaskNotFoundException;
use Todo\Domain\Task\Service\Repository;

class TaskTest extends \Codeception\Test\Unit
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
	public function testConstructTask()
	{
		$name = "Task " . rand();
		
		$task = Task::fromName(new Task\ValueObject\Name($name));
		
		$this->assertNotNull($task->getId());
		$this->assertEquals($name, $task->getName());


	}


	public function testConstructInvalidTask()
	{

		$this->tester->expectException(InvalidNameException::class, function() {
			$task = Task::fromName(new Task\ValueObject\Name(""));
		});

		$this->tester->expectException(InvalidNameException::class, function() {
			$task = Task::fromName(new Task\ValueObject\Name("oh fuck"));
		});


	}

}