<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class CamelCaseTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getCamelCaseResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testCamelCaseFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->camelCase();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getCamelCaseResults()
    {
        return [
            ['text is low', 'Text Is Low'],
            ['foo bar', 'Foo Bar'],
            ['fOo bAr', 'Foo Bar'],
            ['FOO BAR', 'Foo Bar'],
            ['', ''],
            ['lol', 'Lol'],
            ['l0l', 'L0l'],
            ['~!lolz!~', '~!lolz!~'],
        ];
    }
}
