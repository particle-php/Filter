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
 * Class Callback
 *
 * @package Particle\Filter\FilterRule
 */
class Callback extends FilterRule
{
    /**
     * @var callable
     */
    protected $callable;

    /**
     * Set callable closure
     *
     * @param $callable
     */
    public function __construct($callable)
    {
        $this->callable = $callable;
    }

    /**
     * Execute the callable and provide a callback for the given value
     *
     * @param mixed $value
     * @return mixed
     */
    public function filter($value)
    {
        return call_user_func($this->callable, $value);
    }
}
