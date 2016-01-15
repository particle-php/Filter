<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter\FilterRule;

use Particle\Filter\FilterResult;
use Particle\Filter\FilterRule;

/**
 * Class Numbers
 *
 * @package Particle\Filter\FilterRule
 */
class Numbers extends FilterRule
{
    /**
     * Only return numbers
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        return new FilterResult(true, preg_replace('/\D/', '', $value));
    }
}
