<?php
/**
 * File: NameIsPolite.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service\Validation;

use function is_numeric;
use function strpos;
use Todo\Domain\Task\Service\Validation\Specification\NameSpecification;

/**
 * Class NameIsPolite
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class NameIsPolite implements NameSpecification
{
	public function isSatisfiedBy(string $name): bool
	{
		return !(
			is_numeric(strpos($name, "fuck"))
			|| is_numeric(strpos($name, "porco dio"))
		);
	}

}