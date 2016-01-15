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
     * Results rule that returns alphabetic numeric characters from the value
     *
     * @return $this
     */
    public function alnum()
    {
        return $this->addRule(new FilterRule\AlNum);
    }

    /**
     * Results rule that returns the value appended with a given value
     *
     * @param string $append
     * @return Chain
     */
    public function append($append)
    {
        return $this->addRule(new FilterRule\Append($append));
    }

    /**
     * Results rule that returns a casted boolean
     *
     * @return $this
     */
    public function bool()
    {
        return $this->addRule(new FilterRule\CastBool);
    }

    /**
     * Returns rule that returns a value modified by a callable closure
     *
     * @param callable $callable
     * @param bool $allowNotSet
     * @return $this
     */
    public function callback(callable $callable, $allowNotSet = false)
    {
        return $this->addRule(new FilterRule\Callback($callable, $allowNotSet));
    }

    /**
     * Returns rule that defaults a given value if the data key was not provided
     *
     * @param mixed $defaultValue
     * @return $this
     */
    public function defaults($defaultValue)
    {
        return $this->addRule(new FilterRule\Defaults($defaultValue));
    }

    /**
     * Returns rule that returns an value in a specific encoding format
     *
     * @param string|null $toEncodingFormat
     * @param string|null $fromEncodingFormat
     * @return FilterResource
     */
    public function encode($toEncodingFormat = null, $fromEncodingFormat = null)
    {
        return $this->addRule(new FilterRule\Encode($toEncodingFormat, $fromEncodingFormat));
    }

    /**
     * Returns rule that results a casted float
     *
     * @return $this
     */
    public function float()
    {
        return $this->addRule(new FilterRule\CastFloat);
    }

    /**
     * Returns rule that results a casted int
     *
     * @return $this
     */
    public function int()
    {
        return $this->addRule(new FilterRule\CastInt);
    }

    /**
     * Returns rule that results all letters of a value
     *
     * @return $this
     */
    public function letters()
    {
        return $this->addRule(new FilterRule\Letters);
    }

    /**
     * Returns rule that results a lower-cased value
     *
     * @return $this
     */
    public function lower()
    {
        return $this->addRule(new FilterRule\Lower);
    }

    /**
     * Returns rule that formats numbers
     *
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeparator
     * @return $this
     */
    public function numberFormat($decimals, $decimalPoint, $thousandSeparator)
    {
        return $this->addRule(new FilterRule\NumberFormat($decimals, $decimalPoint, $thousandSeparator));
    }

    /**
     * Returns rule that results all numbers of a value
     *
     * @return $this
     */
    public function numbers()
    {
        return $this->addRule(new FilterRule\Numbers);
    }

    /**
     * Results rule that returns the value prepended with a given value
     *
     * @param string $prepend
     * @return Chain
     */
    public function prepend($prepend)
    {
        return $this->addRule(new FilterRule\Prepend($prepend));
    }

    /**
     * Results rule that returns a value with replacements by a regex
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
     * Results rule that returns an empty result so it can be removed
     *
     * @return $this
     */
    public function remove()
    {
        return $this->addRule(new FilterRule\Remove);
    }

    /**
     * Results rule that returns an empty result when the value is null so it can be removed
     *
     * @return $this
     */
    public function removeNull()
    {
        return $this->addRule(new FilterRule\RemoveNull);
    }

    /**
     * Results rule that returns a value with replacements
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
     * Returns rule that results a casted string
     *
     * @return $this
     */
    public function string()
    {
        return $this->addRule(new FilterRule\CastString);
    }

    /**
     * Results rule that results a html-stripped value
     *
     * @param null|string $excludeTags
     * @return $this
     */
    public function stripHtml($excludeTags = null)
    {
        return $this->addRule(new FilterRule\StripHtml($excludeTags));
    }

    /**
     * Returns rule that results a trimmed value
     *
     * @param string|null $characters
     * @return $this
     */
    public function trim($characters = null)
    {
        return $this->addRule(new FilterRule\Trim($characters));
    }

    /**
     * Results rule that returns an upper-cased value
     *
     * @return $this
     */
    public function upper()
    {
        return $this->addRule(new FilterRule\Upper);
    }

    /**
     * Returns rule that results a value starting with a upper-cased character
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
