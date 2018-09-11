<?php
/**
 * File: NameSpecification.php - todo
 *
 * @category None
 * @package  Todo
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Task\Service\Validation\Specification;

use Todo\Domain\Task\ValueObject\Name;

/**
 * Interface NameSpecification
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation\Specification
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
interface NameSpecification
{
	public function isSatisfiedBy(string $name): bool;
}