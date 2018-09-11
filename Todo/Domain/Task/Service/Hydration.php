<?php
/**
 * File: Hydration.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service;

use Todo\Domain\Task\ValueObject\Id;
use Todo\Domain\Task\ValueObject\Name;

/**
 * Class Hydration
 *
 * @category None
 * @package  Todo\Domain\Task\Service
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Hydration
{
	public static function fromData($id, $name)
	{
		$idObject = new Id($id);
		$nameObject = new Name($name);
		
		$task = new Task($idObject, $nameObject);
		
		return $task;
	}
}