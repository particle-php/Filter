<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class UpperTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getUpperResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testUpperFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->upper();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getUpperResults()
    {
        return [
            ['text is up', 'TEXT IS UP'],
            ['', ''],
            ['lol', 'LOL'],
            ['l0l', 'L0L'],
            ['~!LoLz!~', '~!LOLZ!~'],
        ];
    }
}
