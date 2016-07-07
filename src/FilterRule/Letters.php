<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter\FilterRule;

use Particle\Filter\FilterRule;

/**
 * Class Letters
 *
 * @package Particle\Filter\FilterRule
 */
class Letters extends FilterRule
{
    /**
     * Only return letters
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        return preg_replace('/[^\pL]/', '', $value);
    }
}
