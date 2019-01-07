<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class AppendTest extends TestCase
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
     * @dataProvider getAppendResults
     * @param string $value
     * @param string $append
     * @param string $filteredValue
     */
    public function testAppendFilterRule($value, $append, $filteredValue)
    {
        $this->filter->value('test')->append($append);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getAppendResults()
    {
        return [
            ['', '', ''],
            ['hello', ' world', 'hello world'],
            ['!', '!', '!!'],
            [null, null, ''],
        ];
    }
}
