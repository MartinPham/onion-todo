<?php
/**
 * File: IsNonEmptyString.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service\Validation\Name;

use function is_string;
use Todo\Domain\Task\Service\Validation\Name\Specification;


/**
 * Class IsNonEmptyString
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class IsNonEmptyString implements Specification
{
	public function isSatisfiedBy(string $name): bool
	{
		return (
			is_string($name)
			&& !empty($name)
		);
	}

}