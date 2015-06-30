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
 * Class Trim
 *
 * @package Particle\Filter\FilterRule
 */
class Trim extends FilterRule
{
    /**
     * @var string|null
     */
    protected $characters;

    /**
     * Set characters to trim, if none are given, use the PHP default
     *
     * @param null|string $characters
     */
    public function __construct($characters = null)
    {
        $this->characters = $characters;
    }

    /**
     * Trim the value, if no characters to trim are given, use the PHP default
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if (is_null($value)) {
            return $value;
        }

        if ($this->characters === null) {
            return trim($value);
        }

        return trim($value, $this->characters);
    }
}
