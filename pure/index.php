<?php

use Todo\Application\Task\AddTask;
//use Todo\Infrastructure\Repository\Memory\TaskRepository;
use Todo\Infrastructure\Repository\File\TaskRepository;

require __DIR__ . '/../vendor/autoload.php';

$taskRepository = new TaskRepository();


$addTask = new AddTask($taskRepository);

//$addTask->addTaskWithName('');
//$addTask->addTaskWithName('fuck');
$addTask->addTaskWithName('hooozk');
//$addTask->addTaskWithName('omggg');
//$addTask->addTaskWithName('hooo');

//var_dump($GLOBALS['tasks']);

//$browseTask = new BrowseTask($taskRepository);
//
//
//foreach($browseTask->browseTaskList() as $task)
//{
//	echo $task->getUuid() . " - " . $task->getName() . PHP_EOL;
//}