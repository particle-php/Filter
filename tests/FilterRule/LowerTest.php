<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class LowerTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getLowerResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testLowerFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->lower();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @dataProvider getLowerResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testLowerFilterRuleMultiByte($value, $filteredValue)
    {
        $value = mb_convert_encoding($value, 'utf-16', 'utf-8');
        $filteredValue = mb_convert_encoding($filteredValue, 'utf-16', 'utf-8');

        $this->filter->setEncodingFormat('utf-8');

        $this->filter->value('test')->lower();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getLowerResults()
    {
        return [
            ['text is low', 'text is low'],
            ['', ''],
            ['LOL', 'lol'],
            ['L0L', 'l0l'],
            ['~!LoLz!~', '~!lolz!~'],
        ];
    }
}
