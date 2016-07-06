<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;

class ReplaceTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getReplaceResults
     * @param string $value
     * @param string $search
     * @param string $replace
     * @param string $filteredValue
     */
    public function testReplaceFilterRule($value, $search, $replace, $filteredValue)
    {
        $this->filter->value('test')->replace($search, $replace);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getReplaceResults()
    {
        return [
            ['', '', '', ''],
            ['no spaces please', ' ', '-', 'no-spaces-please'],
            ['ror', 'r', 'l', 'lol'],
            ['no  spaces please', ['  ', ' '], '-', 'no-spaces-please'],
            ['漢字はユニコード', 'は', 'Foo', '漢字Fooユニコード'],
        ];
    }
}
