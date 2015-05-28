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
 * Class Append
 *
 * @package Particle\Filter\FilterRule
 */
class Append extends FilterRule
{
    /**
     * @var string
     */
    protected $append;

    /**
     * Set text to append
     *
     * @param $append
     */
    public function __construct($append)
    {
        $this->append = $append;
    }

    /**
     * Append the provided text to the given value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        return $value . $this->append;
    }
}
