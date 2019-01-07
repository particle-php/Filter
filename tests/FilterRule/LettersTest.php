<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class LettersTest extends TestCase
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
     * @dataProvider getLettersResults
     * @param string $value
     * @param string $filteredValue
     */
    public function testLettersFilterRule($value, $filteredValue)
    {
        $this->filter->value('test')->letters();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getLettersResults()
    {
        return [
            ['', ''],
            ['onlylettersinhere', 'onlylettersinhere'],
            ['0l!e#t$t.e-r+s9', 'letters'],
        ];
    }
}
