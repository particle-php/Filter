<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter;

/**
 * @package Particle\Filter
 */
abstract class FilterRule
{
    /**
     * @var string|null
     */
    protected $encodingFormat;

    /**
     * @var bool
     */
    protected $allowNotSet = false;

    /**
     * @var bool
     */
    protected $isEmpty = false;

    /**
     * @var array|null
     */
    protected $filterData;

    /**
     * @param string|null $encodingFormat
     */
    public function setEncodingFormat($encodingFormat)
    {
        $this->encodingFormat = $encodingFormat;
    }

    /**
     * Set the value to empty
     *
     * @return null
     */
    protected function setEmpty()
    {
        $this->isEmpty = true;
        return null;
    }

    /**
     * @return bool
     */
    public function isNotEmpty()
    {
        return !$this->isEmpty;
    }

    /**
     * @param array|null $filterData
     */
    public function setFilterData($filterData)
    {
        $this->filterData = $filterData;

        // Make sure that the value is not empty by default
        $this->isEmpty = false;
    }

    /**
     * @return array|null
     */
    public function getFilterData()
    {
        return $this->filterData;
    }

    /**
     * @return bool
     */
    public function allowedNotSet()
    {
        return $this->allowNotSet;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    abstract public function filter($value);
}
