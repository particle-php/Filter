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
 * Class UpperFirst
 *
 * @package Particle\Filter\FilterRule
 */
class UpperWords extends FilterRule
{
    /**
     * Uppercase the first character of the value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        return ucwords($value);
    }
}
