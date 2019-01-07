<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class AlNumTest extends TestCase
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
     * @dataProvider getAlnumResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testAlnumFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->alnum();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getAlnumResults()
    {
        return [
            ['', ''],
            ['0123456789', '0123456789'],
            ['onlylettersinhere', 'onlylettersinhere'],
            ['0l!e#t$t.e-r+s9', '0letters9'],
        ];
    }
}
