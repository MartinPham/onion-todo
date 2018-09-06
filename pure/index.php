<?php

use Todo\Application\Task\AddTask;
use Todo\Application\Task\BrowseTask;
use Todo\Infrastructure\Repository\Memory\TaskRepository;

require __DIR__ . '/../vendor/autoload.php';

$taskRepository = new TaskRepository();
$addTask = new AddTask($taskRepository);

$addTask->addTaskWithName('hey');
$addTask->addTaskWithName('hooo');
$addTask->addTaskWithName('omggg');

$browseTask = new BrowseTask($taskRepository);


foreach($browseTask->browseTaskList() as $task)
{
	echo $task->getUuid() . " - " . $task->getName() . PHP_EOL;
}