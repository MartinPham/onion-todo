<?php

use Todo\Application\Task\Browser;
use Todo\Application\Task\Editor;
//use Todo\Infrastructure\Repository\Memory\TaskRepository;
use Todo\Domain\Task;
use Todo\Infrastructure\Repository\File\TaskRepository;

require __DIR__ . '/../vendor/autoload.php';

$taskRepository = new TaskRepository();


$taskEditor = new Editor($taskRepository);

//$addTask->addTaskWithName('');
$taskEditor->createTaskWithName('fuczk z');
//$addTask->addTaskWithName('hooozk');
//$addTask->addTaskWithName('omggg');
//$addTask->addTaskWithName('hooo');

//$task = Task::fromData(
//	new Task\ValueObject\Name("hooozkaaa"),
//	new Task\ValueObject\Id("task_5b98f476315cc")
//);
//
//$taskRepository->save($task);

$taskBrowser = new Browser($taskRepository);

var_dump($taskBrowser->getAllTasks());

//$browseTask = new BrowseTask($taskRepository);
//
//
//foreach($browseTask->browseTaskList() as $task)
//{
//	echo $task->getUuid() . " - " . $task->getName() . PHP_EOL;
//}