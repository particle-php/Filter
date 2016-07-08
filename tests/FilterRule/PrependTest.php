<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;

class PrependTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getPrependResults
     * @param string $value
     * @param string $prepend
     * @param string $filteredValue
     */
    public function testPrependFilterRule($value, $prepend, $filteredValue)
    {
        $this->filter->value('test')->prepend($prepend);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getPrependResults()
    {
        return [
            ['', '', ''],
            ['world', 'hello ', 'hello world'],
            ['!', '!', '!!'],
            [null, null, ''],
        ];
    }
}
