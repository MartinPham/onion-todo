<?php
namespace Todo\Domain\Entity;

use function rand;
use Todo\Domain\Exception\Task\InvalidNameException;
use TypeError;

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
	
	private function catchTypeError(callable  $call)
	{
		try {
			$call();
		} catch (\TypeError $e)
		{
			return $e;
		}

		return null;
	}

	// tests
	public function testCreateTaskWithName()
	{
		$name = "Test " . rand(0, 100);

		$task = Task::createWithName($name);

		$this->assertNotNull($task->getUuid());
		$this->assertEquals($task->getName(), $name);
	}

	public function testCreateTaskWithInvalidName()
	{
		
		$this->assertNotNull($this->catchTypeError(function(){
			Task::createWithName(null);
		}));
		
		$this->assertNotNull($this->catchTypeError(function(){
			Task::createWithName(true);
		}));
		
		$this->assertNotNull($this->catchTypeError(function(){
			Task::createWithName([]);
		}));
		
		$this->assertNotNull($this->catchTypeError(function(){
			Task::createWithName(1234);
		}));
		
		$this->tester->expectException(InvalidNameException::class, function () {
			Task::createWithName('');
		});
		
	}
}