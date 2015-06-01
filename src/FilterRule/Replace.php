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
 * Class Replace
 *
 * @package Particle\Filter\FilterRule
 */
class Replace extends FilterRule
{
    /**
     * @var mixed
     */
    protected $search;

    /**
     * @var mixed
     */
    protected $replace;

    /**
     * Set required params for replacement
     *
     * @param $search
     * @param $replace
     */
    public function __construct($search, $replace)
    {
        $this->search = $search;
        $this->replace = $replace;
    }

    /**
     * Replace matched for a replacement in the value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        return str_replace($this->search, $this->replace, $value);
    }
}
