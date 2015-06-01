<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter\FilterRule;

use Particle\Filter\FilterRule;

/**
 * Class Boolean
 *
 * @package Particle\Filter\FilterRule
 */
class Boolean extends FilterRule
{
    /**
     * Convert the value to a bool
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
