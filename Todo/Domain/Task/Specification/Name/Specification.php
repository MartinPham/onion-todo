<?php
/**
 * File: Specification.phpodo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Specification\Name;


/**
 * Interface Specification
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation\Specification
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
interface Specification
{
	public function isSatisfiedBy(string $name): bool;
}