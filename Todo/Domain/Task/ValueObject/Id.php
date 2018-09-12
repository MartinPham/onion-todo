<?php
/**
 * File: Id.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\ValueObject;

use function uniqid;

/**
 * Class Id
 *
 * @category None
 * @package  Todo\Domain\Task\ValueObject
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Id
{
	/**
	 * Id
	 *
	 * @var string
	 */
	private $id;

	/**
	 * Id constructor
	 *
	 * @param string|null $id
	 * 
	 */
	public function __construct(string $id = null)
	{
		if($id === null)
		{
			$id = uniqid('task_');
		}
		$this->id = $id;
	}

	public function __toString()
	{
		return $this->id;
	}

	public function equals(Id $id)
	{
		return (string)$id === $this->id;
	}

}