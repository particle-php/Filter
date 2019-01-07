<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class BoolTest extends TestCase
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

        $this->assertEquals($filteredValue, $result['test']);
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
