<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter;

/**
 * Class Filter
 *
 * @package Particle\Filter
 */
class Filter
{
    /**
     * @var Chain[]
     */
    protected $chains = [];

    /**
     * @var Chain
     */
    protected $globalChain = null;

    /**
     * Set a filter for a value on a specific key
     *
     * @param string $key
     * @return Chain
     */
    public function value($key)
    {
        return $this->getChain($key);
    }

    /**
     * Set a filter for all values off an array
     *
     * @return Chain
     */
    public function all()
    {
        return $this->getChain(null);
    }

    /**
     * Filter the provided tat
     *
     * @param array $data
     * @return array
     */
    public function filter(array $data)
    {
        if ($this->globalChain !== null) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->globalChain->filter($value);
            }
        }

        foreach ($this->chains as $key => $chain) {
            if (array_key_exists($key, $data)) {
                $data[$key] = $chain->filter($data[$key]);
            }
        }

        return $data;
    }

    /**
     * Get a filter rule chain for a key
     *
     * @param null|string $key
     * @return Chain
     */
    protected function getChain($key)
    {
        // If no key, set global chain
        if ($key === null) {
            if ($this->globalChain === null) {
                $this->globalChain = $this->buildChain();
            }
            return $this->globalChain;
        }

        // Return chain for key
        if (isset($this->chains[$key])) {
            return $this->chains[$key];
        }
        return $this->chains[$key] = $this->buildChain();
    }

    /**
     * Build a new chain of filters
     *
     * @return Chain
     */
    protected function buildChain()
    {
        return new Chain();
    }
}
