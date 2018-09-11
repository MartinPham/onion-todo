<?php

use Todo\Application\Task\AddTask;
use Todo\Application\Task\BrowseTask;
use Todo\Domain\Task\Service\Factory\FromName;
use Todo\Domain\Task\Service\Validation\NameIsUnique;
use Todo\Infrastructure\Repository\Memory\TaskRepository;

require __DIR__ . '/../vendor/autoload.php';

$taskRepository = new TaskRepository();


$addTask = new AddTask($taskRepository);

//$addTask->addTaskWithName('');
//$addTask->addTaskWithName('fuck');
$addTask->addTaskWithName('hooo');
$addTask->addTaskWithName('omggg');
$addTask->addTaskWithName('hooo');

var_dump($GLOBALS['tasks']);

//$browseTask = new BrowseTask($taskRepository);
//
//
//foreach($browseTask->browseTaskList() as $task)
//{
//	echo $task->getUuid() . " - " . $task->getName() . PHP_EOL;
//}