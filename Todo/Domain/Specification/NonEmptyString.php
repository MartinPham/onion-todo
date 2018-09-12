<?php
/**
 * File: NonEmptyString.php todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Specification;

use function is_string;

/**
 * Class NonEmptyString
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class NonEmptyString
{
	public function isSatisfiedBy(string $value): bool
	{
		return (
			is_string($value)
			&& !empty($value)
		);
	}

}