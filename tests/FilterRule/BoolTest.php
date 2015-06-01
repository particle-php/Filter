<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class BoolTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getBoolResults
     * @param mixed $value
     * @param bool $filteredValue
     */
    public function testBoolFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->bool();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getBoolResults()
    {
        return [
            [true, true],
            [false, false],
            ['', false],
            [null, false],
            ['true', true],
            ['false', false],
            ['watskebeurt', false],
            ['yes', true],
            ['on', true],
            ['1', true],
            [1, true],
            [0, false],
            ['0', false],
            ['no', false],
            ['off', false],
        ];
    }
}
