<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class StripHtmlTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getStripHtmlResults
     * @param string $value
     * @param string $excludeTags
     * @param string $filteredValue
     */
    public function testStripHtmlFilterRule($value, $excludeTags, $filteredValue)
    {
        $this->filter->value('test')->stripHtml($excludeTags);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getStripHtmlResults()
    {
        return [
            ['', '', ''],
            ['<p><strong>t</strong>ext</p>', null, 'text'],
            ['<p><strong>t</strong>ext</p>', '<p>', '<p>text</p>'],
        ];
    }
}
