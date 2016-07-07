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
 * Class Upper
 *
 * @package Particle\Filter\FilterRule
 */
class Upper extends FilterRule
{
    /**
     * Uppercase the given value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if ($this->encodingFormat !== null) {
            return mb_strtoupper($value, $this->encodingFormat);
        }

        return mb_strtoupper($value);
    }
}
