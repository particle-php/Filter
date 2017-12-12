<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter\FilterRule;

use Particle\Filter\FilterRule;

/**
 * Class DecodeJSON
 *
 * A filter that decodes the given value from JSON. If a value is not a string, it is returned as is. If a value is not
 * a correct JSON or if an encoded data is deeper than the recursion limit, `null` is returned.
 *
 * @package Particle\Filter\FilterRule
 */
class DecodeJSON extends FilterRule
{
    /**
     * @var bool When `true`, decoded objects will be converted into associative arrays
     */
    protected $assoc;

    /**
     * @var int Decode recursion depth
     */
    protected $depth;

    /**
     * @var int Bitmask of JSON decode options
     */
    protected $options;

    /**
     * Set required params for JSON decoding
     *
     * @param bool $assoc When `true`, decoded objects will be converted into associative arrays
     * @param int $depth Decode recursion dept
     * @param int $options Bitmask of JSON decode options
     * @see http://php.net/manual/en/function.json-decode.php More information about the parameters
     */
    public function __construct($assoc, $depth, $options)
    {
        $this->assoc = $assoc;
        $this->depth = $depth;
        $this->options = $options;
    }

    /**
     * Decodes the value JSON
     *
     * @param mixed $value
     * @return mixed
     */
    public function filter($value)
    {
        if (!is_string($value)) {
            return $value;
        }

        return json_decode($value, $this->assoc, $this->depth, $this->options);
    }
}
