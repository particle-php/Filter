<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class TrimTest extends TestCase
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
     * @param string|null $characters
     */
    public function testTrimFilterRule($value, $filteredValue, $characters)
    {
        if ($characters === null) {
            $this->filter->value('test')->trim();
        } else {
            $this->filter->value('test')->trim($characters);
        }

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertSame($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getTrimResults()
    {
        return [
            ['', '', null],
            ['', '', ''],
            ['some value', 'some value', null],
            [' abc', 'abc', null],
            ['abc ', 'abc', null],
            [' abc ', 'abc', null],
            ['   abc      ', 'abc', null],
            ['  !~! ', '!~!', null],
            ['	 tabtab 	', ' tabtab ', "\t"],
            [null, null, null],
        ];
    }
}
