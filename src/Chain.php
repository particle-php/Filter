<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter;
use Exception;

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
     * @param bool $isNotEmpty
     * @param mixed $value
     * @param array|null $filterData
     * @return FilterResult
     * @throws Exception
     */
    public function filter($isNotEmpty, $value = null, $filterData = null)
    {
        /** @var FilterRule $rule */
        foreach ($this->rules as $rule) {
            $rule->setFilterData($filterData);
            if ($isNotEmpty || $rule->allowedNotSet()) {
                $filterResult = $rule->filter($value);

                if (!$filterResult instanceof FilterResult) {
                    throw new Exception(
                        'A FilterResult object must be returned by the FilterRule->filter function.'
                        . ' got another value from ' . get_class($rule)
                    );
                }

                $isNotEmpty = $filterResult->isNotEmpty();
                $value = $filterResult->getFilteredValue();
            }
        }

        return new FilterResult($isNotEmpty, $value);
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
