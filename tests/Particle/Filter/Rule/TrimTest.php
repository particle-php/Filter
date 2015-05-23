<?php
namespace Particle\Tests\Filter\Rule;

use Particle\Filter\Rule\Trim;
use Particle\Filter\Filter;

class TrimTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getTrimResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testTrimFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->trim();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getTrimResults()
    {
        return [
            ['some value', 'some value'],
            ['', ''],
            [' abc', 'abc'],
            ['abc ', 'abc'],
            [' abc ', 'abc'],
            ['   abc      ', 'abc'],
            ['  !~! ', '!~!'],
        ];
    }
}
