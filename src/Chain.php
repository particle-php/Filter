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
     * Execute all filters in the chain
     *
     * @param bool $isSet
     * @param mixed $value
     * @return FilterResult
     */
    public function filter($isSet, $value = null)
    {
        /** @var FilterRule $rule */
        foreach ($this->rules as $rule) {
            if ($isSet || $rule->allowedNotSet()) {
                $value = $rule->filter($value);
                $isSet = true;
            }
        }

        return new FilterResult($isSet, $value);
    }

    /**
     * Add a new rule to the chain
     *
     * @param FilterRule $rule
     * @param string|null $encodingFormat
     * @return $this
     */
    public function addRule(FilterRule $rule, $encodingFormat)
    {
        $rule->setEncodingFormat($encodingFormat);

        $this->rules[] = $rule;

        return $this;
    }
}
