<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter;

class Filter
{
    protected $chain;

    public function value($key)
    {
        // result chain for $key
    }

    public function all()
    {
        // result chain for all
    }

    /**
     * Filter the provided tat
     *
     * @param array $data
     * @return array
     */
    public function filter(array $data)
    {
        return [];
    }

    protected function getChain()
    {
        // Result chain
    }
}
