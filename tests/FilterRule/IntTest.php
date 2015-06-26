<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class IntTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getIntResults
     * @param mixed $value
     * @param int $filteredValue
     */
    public function testIntFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->int();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getIntResults()
    {
        return [
            ['', 0],
            ['lol', 0],
            ['0', 0],
            [1, 1],
            [100, 100],
            ['1', 1],
            ['100', 100],
            [99.99, 99],
            ['99.99', 99],
            [null, 0],
            [false, 0],
        ];
    }
}
