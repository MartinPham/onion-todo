<?php

namespace Todo\Application\Task;



use Todo\Domain\Task\Exception\InvalidTaskName;
use Todo\Domain\Task\Exception\TaskNotFound;
use Todo\Domain\Task\Service\Factory\FromName;
use Todo\Domain\Task\Service\Repository;
use Todo\Domain\Task\Service\Validation\NameIsUnique;

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
    		Repository::class,
			[
				'findByName' => function ()
				{
					throw new TaskNotFound("");
				}
			]
		);
    	
    	
    	
		$addTask = new AddTask($taskRepository);
		$addTask->addTaskWithName($name);


    }
    
    
    public function testAddInvalidTask()
    {
		$name = "Task " . rand();
		$taskRepository = $this->makeEmpty(
			Repository::class,
			[
				'findByName' => function ()
				{
					throw new TaskNotFound("");
				}
			]
		);



		$addTask = new AddTask($taskRepository);

		
    	$this->tester->expectException(InvalidTaskName::class, function() use ($addTask){
			$addTask->addTaskWithName("");
		});
		
    	$this->tester->expectException(InvalidTaskName::class, function() use ($addTask){
			$addTask->addTaskWithName("oh fuck");
		});
		
		
    }
}