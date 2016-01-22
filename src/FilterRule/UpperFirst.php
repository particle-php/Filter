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
 * Class UpperFirst
 *
 * @package Particle\Filter\FilterRule
 */
class UpperFirst extends FilterRule
{
    /**
     * Uppercase the first character of the value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if ($this->encodingFormat !== null) {
            $firstChar = mb_substr($value, 0, 1, $this->encodingFormat);
            $rest = mb_substr($value, 1, null, $this->encodingFormat);
            return mb_strtoupper($firstChar, $this->encodingFormat) . $rest;
        }

        $firstChar = mb_substr($value, 0, 1);
        $rest = mb_substr($value, 1);

        return mb_strtoupper($firstChar) . $rest;
    }
}
