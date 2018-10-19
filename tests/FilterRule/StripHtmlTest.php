<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class StripHtmlTest extends TestCase
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

        $this->assertSame($filteredValue, $result['test']);
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
            [null, null, null],
        ];
    }
}
