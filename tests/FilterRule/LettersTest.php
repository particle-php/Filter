<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class LettersTest extends \PHPUnit_Framework_TestCase
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

        $this->assertEquals($result['test'], $filteredValue);
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