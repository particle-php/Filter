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
 * Class FilterResource
 * @package Particle\Filter
 */
class FilterResource
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var null|string|string[]
     */
    protected $keys;

    /**
     * @param Filter $filter
     * @param null|string|string[] $keys
     */
    public function __construct(Filter $filter, $keys = null)
    {
        $this->filter = $filter;
        $this->keys = $keys;
    }

    /**
     * Add append filter-rule to the chain
     *
     * @param string $append
     * @return Chain
     */
    public function append($append)
    {
        return $this->addRule(new FilterRule\Append($append));
    }

    /**
     * Add bool filter-rule to the chain
     *
     * @return $this
     */
    public function bool()
    {
        return $this->addRule(new FilterRule\Boolean);
    }

    /**
     * Add callback filter-rule to the chain
     *
     * @return $this
     */
    public function callback(callable $callable)
    {
        return $this->addRule(new FilterRule\Callback($callable));
    }

    /**
     * Add float filter-rule to the chain
     *
     * @return $this
     */
    public function float()
    {
        return $this->addRule(new FilterRule\CastFloat);
    }

    /**
     * Add int filter-rule to the chain
     *
     * @return $this
     */
    public function int()
    {
        return $this->addRule(new FilterRule\CastInt);
    }

    /**
     * Add lower filter-rule to the chain
     *
     * @return $this
     */
    public function lower()
    {
        return $this->addRule(new FilterRule\Lower);
    }

    /**
     * Add prepend filter-rule to the chain
     *
     * @param string $prepend
     * @return Chain
     */
    public function prepend($prepend)
    {
        return $this->addRule(new FilterRule\Prepend($prepend));
    }

    /**
     * Add replace filter-rule to the chain
     *
     * @param string $searchRegex
     * @param string $replace
     * @return $this
     */
    public function regexReplace($searchRegex, $replace)
    {
        return $this->addRule(new FilterRule\RegexReplace($searchRegex, $replace));
    }

    /**
     * Add replace filter-rule to the chain
     *
     * @param mixed $search
     * @param mixed $replace
     * @return $this
     */
    public function replace($search, $replace)
    {
        return $this->addRule(new FilterRule\Replace($search, $replace));
    }

    /**
     * Add string filter-rule to the chain
     *
     * @return $this
     */
    public function string()
    {
        return $this->addRule(new FilterRule\CastString);
    }

    /**
     * Add stripHtml filter-rule to the chain
     *
     * @param null|string $excludeTags
     * @return $this
     */
    public function stripHtml($excludeTags = null)
    {
        return $this->addRule(new FilterRule\StripHtml($excludeTags));
    }

    /**
     * Add trim filter-rule to the chain
     *
     * @param string|null $characters
     * @return $this
     */
    public function trim($characters = null)
    {
        return $this->addRule(new FilterRule\Trim($characters));
    }

    /**
     * Add upper filter-rule to the chain
     *
     * @return $this
     */
    public function upper()
    {
        return $this->addRule(new FilterRule\Upper);
    }

    /**
     * Add upper-first filter-rule to the chain
     *
     * @return $this
     */
    public function upperFirst()
    {
        return $this->addRule(new FilterRule\UpperFirst);
    }

    /**
     * Add a new rule to the chain
     *
     * @param FilterRule $rule
     * @return $this
     */
    protected function addRule(FilterRule $rule)
    {
        if ($this->keys === null) {
            $this->filter->addFilterRule($rule);
        }

        if (is_array($this->keys)) {
            foreach ($this->keys as $key) {
                $this->filter->addFilterRule($rule, $key);
            }
        } else {
            $this->filter->addFilterRule($rule, $this->keys);
        }

        return $this;
    }
}
