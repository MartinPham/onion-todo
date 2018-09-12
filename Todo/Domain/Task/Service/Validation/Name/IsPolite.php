<?php
/**
 * File: IsPolite.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service\Validation\Name;

use function is_numeric;
use function strpos;
use Todo\Domain\Task\Service\Validation\Name\Specification;

/**
 * Class IsPolite
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class IsPolite implements Specification
{
	public function isSatisfiedBy(string $name): bool
	{
		return !(
			is_numeric(strpos($name, "fuck"))
			|| is_numeric(strpos($name, "porco dio"))
		);
	}

}