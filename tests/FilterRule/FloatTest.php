<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class FloatTest extends TestCase
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
     * @dataProvider getFloatResults
     * @param mixed $value
     * @param int $filteredValue
     */
    public function testFloatFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->float();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getFloatResults()
    {
        return [
            ['', 0.0],
            ['lol', 0.0],
            ['0', 0.0],
            [1, 1.0],
            [100, 100.0],
            ['1', 1.0],
            ['100', 100.0],
            [99.99, 99.99],
            ['99.99', 99.99],
            [null, 0.0],
            [false, 0.0],
            [true, 1.0],
        ];
    }
}
