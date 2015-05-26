<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class UpperFirstTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getUpperFirstResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testUpperFirstFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->upperFirst();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getUpperFirstResults()
    {
        return [
            ['text is low', 'Text is low'],
            ['', ''],
            ['lol', 'Lol'],
            ['l0l', 'L0l'],
            ['~!lolz!~', '~!lolz!~'],
        ];
    }
}
