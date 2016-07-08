<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;

class StringTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getStringResults
     * @param mixed $value
     * @param string $filteredValue
     */
    public function testStringFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->string();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getStringResults()
    {
        return [
            ['', ''],
            ['lol', 'lol'],
            [1, '1'],
            [99.99, '99.99'],
            [null, ''],
            [false, ''],
            [true, '1'], // php...
        ];
    }
}
