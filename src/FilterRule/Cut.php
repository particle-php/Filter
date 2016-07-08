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
 * Class Cut
 *
 * @package Particle\Filter\FilterRule
 */
class Cut extends FilterRule
{
    /**
     * @var int
     */
    private $start;

    /**
     * @var int|null
     */
    private $length;

    /**
     * @param int       $start
     * @param int|null  $length
     */
    public function __construct($start, $length = null)
    {
        $this->start = $start;
        $this->length = $length;
    }

    /**
     * Cuts the given value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if ($this->encodingFormat !== null) {
            return mb_substr($value, $this->start, $this->length, $this->encodingFormat);
        }

        return mb_substr($value, $this->start, $this->length);
    }
}
