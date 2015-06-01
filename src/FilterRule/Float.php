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
 * Class Float
 *
 * @package Particle\Filter\FilterRule
 */
class Float extends FilterRule
{
    /**
     * Convert the value to a float
     *
     * @param mixed $value
     * @return float
     */
    public function filter($value)
    {
        return floatval($value);
    }
}
