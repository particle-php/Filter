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
    protected $isEmpty;

    /**
     * @var mixed
     */
    protected $filteredValue;

    /**
     * @param bool $isEmpty
     * @param null|mixed $filteredValue
     */
    public function __construct($isEmpty, $filteredValue = null)
    {
        $this->isEmpty = $isEmpty;
        $this->filteredValue = $filteredValue;
    }

    /**
     * Is the filter result not empty
     *
     * @return bool
     */
    public function isNotEmpty()
    {
        return !$this->isEmpty;
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
