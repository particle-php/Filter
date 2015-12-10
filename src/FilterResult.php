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
 * @package Particle\Filter
 */
class FilterResult
{
    /**
     * @var bool
     */
    protected $isSet;

    /**
     * @var mixed
     */
    protected $filteredValue;

    /**
     * @param bool $isSet
     * @param null|mixed $filteredValue
     */
    public function __construct($isSet, $filteredValue = null)
    {
        $this->isSet = $isSet;
        $this->filteredValue = $filteredValue;
    }

    /**
     * Is the filter result not empty
     *
     * @return bool
     */
    public function isNotEmpty()
    {
        return $this->isSet;
    }

    /**
     * Get the filtered value
     *
     * @return mixed|null
     */
    public function getFilteredValue()
    {
        return $this->filteredValue;
    }
}
