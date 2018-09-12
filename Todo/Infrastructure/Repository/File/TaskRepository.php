<?php
/**
 * File: TaskRepository.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Infrastructure\Repository\File;

use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function json_decode;
use function json_encode;
use Todo\Domain\Task;
use Todo\Domain\Task\Service\Repository;
use Todo\Domain\Task\ValueObject\Id;
use function var_dump;

/**
 * Class TaskRepository
 *
 * @category None
 * @package  Todo\Infrastructure\Repository\File
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class TaskRepository implements Repository
{
	/**
	 * Data
	 *
	 * @var Task[]
	 */
	private $data;

	/**
	 * TaskRepository constructor
	 *
	 *
	 * @throws Task\Exception\InvalidNameException
	 */
	public function __construct()
	{
		if(!file_exists($this->filePath))
		{
			file_put_contents($this->filePath, json_encode([]));
		}

	}
	
	/** @var string  */
	private $filePath = __DIR__ . '/task.json';

	/**
	 * _readFromFile
	 * @return void
	 * @throws Task\Exception\InvalidNameException
	 */
	private function _readFromFile()
	{
		$data = (string)file_get_contents($this->filePath);
		$jsonData = json_decode($data);

		$this->data = [];
		foreach($jsonData as $taskJsonData)
		{
			$task = Task::fromData(new Task\ValueObject\Name($taskJsonData->name), new Id($taskJsonData->id));

			$this->data[] = $task;
		}
	}

	/**
	 * _writeToFile
	 * @return void
	 */
	private function _writeToFile()
	{

		$jsonData = [];
		foreach($this->data as $task)
		{
			$jsonData[] = [
				'id' => (string)$task->getId(),
				'name' => (string)$task->getName()
			];
		}

		file_put_contents($this->filePath, json_encode($jsonData));
	}


	public function find(Task\ValueObject\Id $id): Task
	{
		$this->_readFromFile();
		
		/** @var Task $task */
		foreach($this->data as &$task)
		{
			if($task->getId()->equals($id))
			{
				return $task;
			}
		}

		throw new Task\Exception\TaskNotFoundException("Task from id " . $id . " not found");
	}

	public function findByName(Task\ValueObject\Name $name): Task
	{

		$this->_readFromFile();
		
		/** @var Task $task */
		foreach($this->data as &$task)
		{
			if($task->getName()->equals($name))
			{
				return $task;
			}
		}

		throw new Task\Exception\TaskNotFoundException("Task from name " . $name . " not found");
	}

	public function findAll(): array
	{
		return $this->data;
	}


	public function save(Task $task)
	{

		$this->_readFromFile();
		
		$matchedTask = null;

		try {
			$matchedTask = $this->find($task->getId());
		} catch (Task\Exception\TaskNotFoundException $exception)
		{

		}
		
		
		$taskNameIsAlreadyUsed = false;

		try {
			$existedTaskWithSameName = $this->findByName($task->getName());

			if(!$existedTaskWithSameName->equals($task))
			{
				$taskNameIsAlreadyUsed = true;
			}
		} catch (Task\Exception\TaskNotFoundException $exception)
		{

		}

		if($taskNameIsAlreadyUsed)
		{
			throw new Task\Exception\DuplicateTaskException("Task name " . $task->getName() . " is already used");
		}

		if($matchedTask !== null)
		{
			$matchedTask->setName($task->getName());
		} else {
			$this->data[] = $task;
		}
		
		$this->_writeToFile();
	}

	public function remove(Task $task)
	{

		$this->_readFromFile();
		
		foreach($this->data as $taskKey => $taskItem)
		{
			if($taskItem->equals($task))
			{
				array_splice($this->data, $taskKey, 1);

				$this->_writeToFile();
				return;
			}
		}
		
		throw new Task\Exception\TaskNotFoundException("Task not found");
	}


}