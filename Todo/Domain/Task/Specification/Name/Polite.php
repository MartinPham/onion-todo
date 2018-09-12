<?php
/**
 * File: Politehp - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Specification\Name;

use function is_numeric;
use function strpos;
use Todo\Domain\Task\Specification\Name\Specification;

/**
 * Class Polite
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Polite implements Specification
{
	public function isSatisfiedBy(string $name): bool
	{
		return !(
			is_numeric(strpos($name, "fuck"))
			|| is_numeric(strpos($name, "porco dio"))
		);
	}

}