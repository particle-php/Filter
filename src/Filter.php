<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter;

use Particle\Filter\Value\Container;

/**
 * Class Filter
 *
 * @package Particle\Filter
 */
class Filter
{
    /**
     * @var array<string, Chain>
     */
    protected $chains = [];

    /**
     * @var Container
     */
    protected $data;

    /**
     * @var string|null
     */
    protected $encodingFormat = null;

    /**
     * @var Chain
     */
    protected $globalChain = null;

    /**
     * Set a filter for a value on a specific key
     *
     * @param string $key
     * @return FilterResource
     */
    public function value($key)
    {
        return $this->getFilterResource($key);
    }

    /**
     * Set a filter for the values on the given keys
     *
     * @param string[] $keys
     * @return FilterResource
     */
    public function values(array $keys)
    {
        return $this->getFilterResource($keys);
    }

    /**
     * Set a filter for all values off an array
     *
     * @return FilterResource
     */
    public function all()
    {
        return $this->getFilterResource();
    }

    /**
     * @param null|string|string[] $keys
     * @return FilterResource
     */
    public function getFilterResource($keys = null)
    {
        return new FilterResource($this, $keys);
    }

    /**
     * Set the encoding format for all string manipulating filter-rules.
     * Note: You should set the encoding format before you add filter-rules to your filter, otherwise the
     * encoding format would not be set on the values added before the encoding format was set.
     *
     * @param string $encodingFormat
     */
    public function setEncodingFormat($encodingFormat)
    {
        $this->encodingFormat = $encodingFormat;
    }

    /**
     * Set a filter rule on a chain
     *
     * @param FilterRule $rule
     * @param null|string $key
     */
    public function addFilterRule(FilterRule $rule, $key = null)
    {
        $this->getChain($key)->addRule($rule, $this->encodingFormat);
    }

    /**
     * Filter the provided data
     *
     * @param array $data
     * @return array
     */
    public function filter(array $data)
    {
        $data = $this->filterArrayWithGlobalChain($data);

        $this->data = new Container($data);

        $this->filterChains();

        return $this->data->getArrayCopy();
    }

    /**
     * Filter all set fields with a global chain, recursively
     *
     * @param array $data
     * @return array
     */
    protected function filterArrayWithGlobalChain(array $data)
    {
        if ($this->globalChain === null) {
            return $data;
        }

        foreach ($data as $key => $value) {
            $data = $this->filterValueWithGlobalChain($value, $key, $data);
        }

        return array_filter($data);
    }

    /**
     * Filters a value with the global chain
     *
     * @param mixed $value
     * @param string $key
     * @param array $data
     * @return array
     */
    protected function filterValueWithGlobalChain($value, $key, $data)
    {
        if (is_array($value)) {
            $data[$key] = $this->filterArrayWithGlobalChain($value);
            return $data;
        }

        $filterResult = $this->globalChain->filter(true, $value, $data);
        if ($filterResult->isNotEmpty()) {
            $data[$key] = $filterResult->getFilteredValue();
        } else {
            unset($data[$key]);
        }
        return $data;
    }

    /**
     * Get the filter result from a chain
     *
     * @param string $key
     * @param Chain $chain
     * @return FilterResult
     */
    protected function getFilterResult($key, Chain $chain)
    {
        if ($this->data->has($key)) {
            return $chain->filter(true, $this->data->get($key), $this->data->getArrayCopy());
        }

        return $chain->filter(false, null, $this->data->getArrayCopy());
    }

    /**
     * Filter all chains set
     */
    protected function filterChains()
    {
        foreach ($this->chains as $key => $chain) {
            $filterResult = $this->getFilterResult($key, $chain);
            if ($filterResult->isNotEmpty()) {
                $this->data->set(
                    $key,
                    $filterResult->getFilteredValue()
                );
            } else {
                $this->data->remove($key);
            }
        }
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
            return $this->getGlobalChain();
        }

        // Return chain for key
        if (isset($this->chains[$key])) {
            return $this->chains[$key];
        }
        return $this->chains[$key] = $this->buildChain();
    }

    /**
     * Get the global chain for all values
     *
     * @return Chain
     */
    protected function getGlobalChain()
    {
        if ($this->globalChain === null) {
            $this->globalChain = $this->buildChain();
        }
        return $this->globalChain;
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
