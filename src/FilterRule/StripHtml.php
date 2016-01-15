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
 * Class StripHtml
 *
 * @package Particle\Filter\FilterRule
 */
class StripHtml extends FilterRule
{
    /**
     * @var string
     */
    protected $excludeTags;

    /**
     * Set tags that wont be stripped
     *
     * @param string|null $excludeTags
     */
    public function __construct($excludeTags = null)
    {
        $this->excludeTags = $excludeTags;
    }

    /**
     * Strip html tags from the value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if ($value === null) {
            return new FilterResult(true, $value);
        }

        return new FilterResult(true, strip_tags($value, $this->excludeTags));
    }
}
