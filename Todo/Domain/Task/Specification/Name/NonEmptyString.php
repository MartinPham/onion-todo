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

namespace Todo\Domain\Task\Specification\Name;

use function is_string;
use Todo\Domain\Task\Specification\Name\Specification;


/**
 * Class NonEmptyString
 *
 * @category None
 * @package  Todo\Domain\Task\Service\Validation
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class NonEmptyString extends \Todo\Domain\Specification\NonEmptyString implements Specification
{

}