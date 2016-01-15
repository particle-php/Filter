<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter\FilterRule;

use Particle\Filter\FilterResult;
use Particle\Filter\FilterRule;

/**
 * Class RegexReplace
 *
 * @package Particle\Filter\FilterRule
 */
class RegexReplace extends FilterRule
{
    /**
     * @var mixed
     */
    protected $searchRegex;

    /**
     * @var mixed
     */
    protected $replace;

    /**
     * Set required params for replacement
     *
     * @param string $searchRegex
     * @param string $replace
     */
    public function __construct($searchRegex, $replace)
    {
        $this->searchRegex = $searchRegex;
        $this->replace = $replace;
    }

    /**
     * Replace matched regex for a replacement in the value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        return new FilterResult(true, preg_replace($this->searchRegex, $this->replace, $value));
    }
}
