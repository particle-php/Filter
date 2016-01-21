<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class RemoveNullTest extends \PHPUnit_Framework_TestCase
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
     * Test if a provided value gets unset completely
     */
    public function testKeyGetsRemoved()
    {
        $this->filter->value('test')->removeNull();

        $result = $this->filter->filter([
            'test' => null,
            'test2' => 'test',
        ]);

        $this->assertEquals(['test2' => 'test'], $result);
    }

    /**
     * Test if a provided value gets unset completely
     */
    public function testRemoveNullOnAllValues()
    {
        $this->filter->all()->removeNull();

        $result = $this->filter->filter([
            'test' => null,
            'test2' => 'test',
            'test3' => null,
            'test4' => 'test',
            'test5' => null,
        ]);

        $this->assertEquals(['test2' => 'test', 'test4' => 'test'], $result);
    }

    /**
     * @dataProvider getNotNullValues
     * @param string $value
     */
    public function testNumbersFilterRule($value)
    {
        $this->filter->value('test')->removeNull();

        $result = $this->filter->filter([
            'test' => $value,
        ]);

        $this->assertEquals([
            'test' => $value,
        ], $result);
    }

    /**
     * @return array
     */
    public function getNotNullValues()
    {
        return [
            [''],
            [false],
            [0],
            [1],
        ];
    }
}
