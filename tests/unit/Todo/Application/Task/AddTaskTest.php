<?php

namespace Todo\Application\Task;

use Todo\Application\Exception\ImpoliteNameException;
use Todo\Domain\Entity\Task;
use Todo\Domain\Service\Repository\TaskRepositoryInterface;

class AddTaskTest extends \Codeception\Test\Unit
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
    public function testAddTask()
    {
    	$name = "Task " . rand();
    	$taskRepository = $this->makeEmpty(
    		TaskRepositoryInterface::class
		);
    	
		$addTask = new AddTask($taskRepository);
		$addTask->addTaskWithName($name);


    }
    
    
    public function testAddInvalidTask()
    {
		$taskRepository = $this->makeEmpty(
			TaskRepositoryInterface::class
		);

		$addTask = new AddTask($taskRepository);
		
    	$this->tester->expectException(ImpoliteNameException::class, function() use ($addTask){

			$name = "Task fuck " . rand();

			$addTask->addTaskWithName($name);
		});
		
		
    }
}