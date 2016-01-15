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
 * Class Defaults
 *
 * @package Particle\Filter\FilterRule
 */
class Defaults extends FilterRule
{
    /**
     * Allows a default value to be set if no data key was provided
     *
     * @var bool
     */
    protected $allowNotSet = true;

    /**
     * @var mixed
     */
    protected $defaultValue;

    /**
     * @param mixed $defaultValue
     */
    public function __construct($defaultValue)
    {
        $this->defaultValue = $defaultValue;
    }

    /**
     * Return a default value if no value was provided
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        return new FilterResult(true, $value === null ? $this->defaultValue : $value);
    }
}
