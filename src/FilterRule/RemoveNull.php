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
 * Class RemoveNull
 *
 * @package Particle\Filter\FilterRule
 */
class RemoveNull extends FilterRule
{
    /**
     * Returns an empty filter result if the value is null so the value can be removed.
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if ($value === null) {
            return $this->setEmpty();
        }

        return $value;
    }
}
