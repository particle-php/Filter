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
 * Class NumberFormat
 *
 * @package Particle\Filter\FilterRule
 */
class NumberFormat extends FilterRule
{
    /**
     * @var int
     */
    protected $decimals;

    /**
     * @var string
     */
    protected $decimalPoint;

    /**
     * @var string
     */
    protected $thousandSeperator;

    /**
     * Set required params for replacement
     *
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     */
    public function __construct($decimals, $decimalPoint, $thousandSeperator)
    {
        $this->decimals = $decimals;
        $this->decimalPoint = $decimalPoint;
        $this->thousandSeperator = $thousandSeperator;
    }

    /**
     * Format the numbers
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if (empty($value)) {
            return $value;
        }
        return number_format(floatval($value), $this->decimals, $this->decimalPoint, $this->thousandSeperator);
    }
}
