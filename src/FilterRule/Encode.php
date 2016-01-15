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
 * Class Encode
 *
 * @package Particle\Filter\FilterRule
 */
class Encode extends FilterRule
{
    /**
     * @var string
     */
    protected $toEncoding;

    /**
     * @var string|null
     */
    protected $fromEncoding;

    /**
     * @param string|null $toEncoding
     * @param string|null $fromEncoding
     */
    public function __construct($toEncoding = null, $fromEncoding = null)
    {
        if ($toEncoding === null) {
            $toEncoding = $this->encodingFormat;
        }

        $this->toEncoding = $toEncoding;
        $this->fromEncoding = $fromEncoding;
    }

    /**
     * Changes encoding of the value
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if ($this->toEncoding === null) {
            return new FilterResult(true, $value);
        }

        if ($this->fromEncoding === null) {
            return new FilterResult(true, mb_convert_encoding($value, $this->toEncoding));
        }

        return new FilterResult(true, mb_convert_encoding($value, $this->toEncoding, $this->fromEncoding));
    }
}
