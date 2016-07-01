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
 * Class Slug
 *
 * @package Particle\Filter\FilterRule
 */
class Slug extends FilterRule
{
    /**
     * Allows a default value to be set if no data key was provided
     *
     * @var bool
     */
    protected $allowNotSet = true;

    /**
     * @var string
     */
    private $fieldToSlugFrom;

    /**
     * @var string
     */
    private $transliterator = "Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();";

    /**
     * @param string $fieldToSlugFrom
     */
    public function __construct($fieldToSlugFrom)
    {
        $this->fieldToSlugFrom = $fieldToSlugFrom;
    }

    /**
     * Slug the value of either the actual field of the given one.
     *
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if (empty($value) && isset($this->filterData[$this->fieldToSlugFrom])) {
            $value = $this->filterData[$this->fieldToSlugFrom];
        }

        if (is_null($value)) {
            return;
        }

        $value = transliterator_transliterate($this->transliterator, $value);
        $value = iconv("UTF-8", "ASCII//TRANSLIT//IGNORE", $value);
        $value = preg_replace('/[-$?\s]+/', '-', $value);
        $value = trim($value, '-');
        return strtolower($value);
    }
}
