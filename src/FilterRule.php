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
    protected $allowEmpty = false;

    /**
     * @param string|null $encodingFormat
     */
    public function setEncodingFormat($encodingFormat)
    {
        $this->encodingFormat = $encodingFormat;
    }

    /**
     * @return bool
     */
    public function allowEmpty()
    {
        return $this->allowEmpty;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    abstract public function filter($value);
}
