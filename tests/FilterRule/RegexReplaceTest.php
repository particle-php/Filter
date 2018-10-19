<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class RegexReplaceTest extends TestCase
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
     * @dataProvider getRegexReplaceResults
     * @param string $value
     * @param string $searchRegex
     * @param string $replace
     * @param string $filteredValue
     */
    public function testRegexReplaceFilterRule($value, $searchRegex, $replace, $filteredValue)
    {
        $this->filter->value('test')->regexReplace($searchRegex, $replace);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getRegexReplaceResults()
    {
        return [
            ['!!!l!#o?*l&&', '/[^a-zA-Z0-9\-]/', '', 'lol'],
            ['no spaces please', '/[\s]/', '-', 'no-spaces-please'],
        ];
    }
}
