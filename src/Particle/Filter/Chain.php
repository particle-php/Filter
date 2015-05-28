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
 * Class Chain
 *
 * @package Particle\Filter
 */
class Chain
{
    /**
     * @var FilterRule[]
     */
    protected $rules;

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
        return $this->addRule(new FilterRule\Bool);
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
        return $this->addRule(new FilterRule\Float);
    }

    /**
     * Add int filter-rule to the chain
     *
     * @return $this
     */
    public function int()
    {
        return $this->addRule(new FilterRule\Int);
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
        return $this->addRule(new FilterRule\String);
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
     * Execute all filters in the chain
     *
     * @param mixed $value
     * @return mixed
     */
    public function filter($value)
    {
        /** @var FilterRule $rule */
        foreach ($this->rules as $rule) {
            $value = $rule->filter($value);
        }

        return $value;
    }

    /**
     * Add a new rule to the chain
     *
     * @param FilterRule $rule
     * @return $this
     */
    protected function addRule(FilterRule $rule)
    {
        $this->rules[] = $rule;

        return $this;
    }
}
