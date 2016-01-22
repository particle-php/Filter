<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter\FilterRule;

use Particle\Filter\Filter;
use Particle\Filter\FilterRule;

/**
 * Class Each
 *
 * @package Particle\Filter\FilterRule
 */
class Each extends FilterRule
{
    /**
     * @var callable
     */
    protected $callable;

    /**
     * @param callable $callable
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * When provided with an array, the callback filter will be executed for every value
     *
     * @param mixed $values
     * @return array
     */
    public function filter($values)
    {
        if (is_array($values)) {
            foreach ($values as $key => $value) {
                $values[$key] = $this->filterValue($value);
            }
        }

        return $values;
    }

    /**
     * Filter a given value with a new filter instance in a callable
     *
     * @param $value
     * @return array
     */
    protected function filterValue($value)
    {
        $filter = new Filter();

        call_user_func($this->callable, $filter);

        return $filter->filter($value);
    }
}
