<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class NumbersTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getNumbersResults
     * @param string $value
     * @param string $excludeTags
     * @param string $filteredValue
     */
    public function testStripHtmlFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->numbers();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getNumbersResults()
    {
        return [
            ['', ''],
            ['1234567890', '1234567890'],
            ['a1s2d3f4g5h6j7k8l9;0', '1234567890'],
        ];
    }
}
