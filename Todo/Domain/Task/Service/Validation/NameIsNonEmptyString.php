<?php
/**
 * File: NameIsNonEmptyString.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service\Validation;

use function is_string;
use Todo\Domain\Task\Service\Validation\Specification\NameSpecification;
use Todo\Domain\Task\ValueObject\Name;

/**
 * Class NameIsNonEmptyString
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class NameIsNonEmptyString implements NameSpecification
{
	public function isSatisfiedBy(string $name): bool
	{
		return (
			is_string($name)
			&& !empty($name)
		);
	}

}