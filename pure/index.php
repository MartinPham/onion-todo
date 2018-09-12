<?php

use Todo\Application\Task\Browser;
use Todo\Application\Task\Editor;
//use Todo\Infrastructure\Repository\Memory\TaskRepository;
use Todo\Application\Task\Remover;
use Todo\Domain\Task;
use Todo\Infrastructure\Repository\File\TaskRepository;

require __DIR__ . '/../vendor/autoload.php';

$taskRepository = new TaskRepository();


$taskEditor = new Editor($taskRepository);

//$taskEditor->createTaskWithName('t1');
//$taskEditor->createTaskWithName('t2');
//$taskEditor->createTaskWithName('t3');


$taskRemover = new Remover($taskRepository);
$taskRemover->removeTaskFromId(new Task\ValueObject\Id("task_5b98f476315cc"));

$taskBrowser = new Browser($taskRepository);

$tasks = $taskBrowser->getAllTasks();

foreach($tasks as $task)
{
	echo "(" . $task->getId() . ") " . $task->getName() . PHP_EOL;
}
