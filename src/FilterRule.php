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
     * @param array|null $filterData
     */
    public function setFilterData($filterData)
    {
        $this->filterData = $filterData;
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
     * @return FilterResult
     */
    abstract public function filter($value);
}
