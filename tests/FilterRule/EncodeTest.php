<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class EncodeTest extends TestCase
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
     * @param string|null $toFormat
     * @param string|null $fromFormat
     * @param string $filteredValue
     */
    public function testRegexReplaceFilterRule($value, $toFormat, $fromFormat, $filteredValue)
    {
        $this->filter->value('test')->encode($toFormat, $fromFormat);

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
            ['', null, null, ''],
            ['hello', 'UTF-8', null, 'hello'],
            ['hello', 'Base64', null, 'aGVsbG8='],
            ['hello', 'Base64', 'UTF-8', 'aGVsbG8='],
            ['aGVsbG8=', 'UTF-8', 'Base64', 'hello'],
        ];
    }
}
