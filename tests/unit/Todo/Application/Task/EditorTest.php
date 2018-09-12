<?php

namespace Todo\Application\Task;



use Todo\Application\Task\DataTransferObject\TaskData;
use Todo\Domain\Task;
use Todo\Domain\Task\Exception\InvalidNameException;
use Todo\Domain\Task\Exception\TaskNotFoundException;
use Todo\Domain\Task\Service\Repository;

class EditorTest extends \Codeception\Test\Unit
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
					throw new TaskNotFoundException("");
				}
			]
		);
    	
    	
    	
		$taskEditor = new Editor($taskRepository);
		$task = $taskEditor->createTaskWithName($name);

		$this->assertNotNull($task);
		$this->assertInstanceOf(Task::class, $task);
		$this->assertEquals($name, $task->getName());
    }
    
    
    public function testAddInvalidTask()
    {
		$name = "Task " . rand();
		$taskRepository = $this->makeEmpty(
			Repository::class,
			[
				'findByName' => function ()
				{
					throw new TaskNotFoundException("");
				}
			]
		);



		$taskEditor = new Editor($taskRepository);

		
    	$this->tester->expectException(InvalidNameException::class, function() use ($taskEditor){
			$taskEditor->createTaskWithName("");
		});
		
    	$this->tester->expectException(InvalidNameException::class, function() use ($taskEditor){
			$taskEditor->createTaskWithName("oh fuck");
		});
		
		
    }
    
    
    public function testUpdateTaskName()
    {
		$id = "id";
		$name = "Task 1";
		$newName = "Task 1xxx";
		
		$taskRepository = $this->makeEmpty(
			Repository::class,
			[
				'find' => function () use ($name, $id)
				{
					return Task::fromData(new Task\ValueObject\Name($name), new Task\ValueObject\Id($id));
				}
			]
		);



		$taskEditor = new Editor($taskRepository);

		
		$taskData = new TaskData();
		$taskData->setName($newName);
		
		$task = $taskEditor->updateTaskWithData(new Task\ValueObject\Id($id), $taskData);


		$this->assertNotNull($task);
		$this->assertInstanceOf(Task::class, $task);
		$this->assertEquals($newName, $task->getName());
		
		
    }
    
}