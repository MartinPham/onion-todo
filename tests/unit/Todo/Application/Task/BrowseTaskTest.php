<?php
namespace Todo\Application\Task;

use function is_array;
use Todo\Domain\Entity\Task;
use Todo\Domain\Service\Repository\TaskRepositoryInterface;

class BrowseTaskTest extends \Codeception\Test\Unit
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
    public function testBrowseTaskList()
    {
		$taskRepository = $this->makeEmpty(
			TaskRepositoryInterface::class,
			[
				'findAll' => function() {
					return [
						Task::createWithName('hey')
					];
				}
			]
		);
		
		$browseTask = new BrowseTask($taskRepository);
		$tasks = $browseTask->browseTaskList();
		
		$this->assertTrue(is_array($tasks));
		
		if(count($tasks) > 0)
		{
			$this->assertInstanceOf(Task::class, $tasks[0]);
		}
    }
}