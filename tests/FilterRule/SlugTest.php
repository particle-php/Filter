<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class SlugTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * Prepare the filter
     */
    public function setUp()
    {
        $this->filter = new Filter();
    }

    /**
     * @dataProvider getSlugResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testSlugFilterRule($value, $filteredValue, $field, $fieldValue)
    {
        $this->filter->value('test')->slug($field);

        $result = $this->filter->filter([
            'test' => $value,
            $field => $fieldValue,
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getSlugResults()
    {
        return [
            ['', '', '', ''],
            ['This is a great stuff to slug !', 'this-is-a-great-stuff-to-slug', '', ''],
            ['That too with somê spéciàl châractèr$ from €ope !', 'that-too-with-some-special-character-from-europe', '', ''],
            ['A æ Übérmensch på høyeste nivå! И я люблю PHP ! ﬁ', 'a-ae-ubermensch-pa-hoyeste-niva-i-a-lublu-php-fi', '', ''],
            ['', 'this-is-a-great-stuff-to-slug', 'test', 'This is a great stuff to slug !'],
            ['', 'that-too-with-some-special-character-from-europe', 'test', 'That too with somê spéciàl châractèr$ from €ope !'],
            ['', 'a-ae-ubermensch-pa-hoyeste-niva-i-a-lublu-php-fi', 'test', 'A æ Übérmensch på høyeste nivå! И я люблю PHP ! ﬁ'],
        ];
    }
}
