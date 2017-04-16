<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class UpperWordsTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getUpperWordsResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testUpperWordsFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->upperWords();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getUpperWordsResults()
    {
        return [
            ['text is low', 'Text Is Low'],
            ['foo bar', 'Foo Bar'],
            ['fOo bAr', 'FOo BAr'],
            ['FOO BAR', 'FOO BAR'],
            ['', ''],
            ['lol', 'Lol'],
            ['l0l', 'L0l'],
            ['~!lolz!~', '~!lolz!~'],
        ];
    }
}
