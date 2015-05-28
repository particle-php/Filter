<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class RegexReplaceTest extends \PHPUnit_Framework_TestCase
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
     * @param string $search
     * @param string $replace
     * @param string $filteredValue
     */
    public function testRegexReplaceFilterRule($value, $searchRegex, $replace, $filteredValue)
    {
        $this->filter->value('test')->regexReplace($searchRegex, $replace);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
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
