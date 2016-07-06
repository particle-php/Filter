<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class NumberFormatTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getTwoDecimalsAndDotResult
     * @param string $value
     * @param string $filteredValue
     */
    public function testNumbersFilterRuleWithTwoDecimalsAndDotAsDecimalSeparator($value, $filteredValue)
    {
        $this->filter->value('test')->numberFormat(2, '.', '');

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @dataProvider getThreeDecimalsAndCommaResult
     * @param string $value
     * @param string $filteredValue
     */
    public function testNumbersFilterRuleWithThreeDecimalsAndCommaAsDecimalSeparator($value, $filteredValue)
    {
        $this->filter->value('test')->numberFormat(3, ',', '');

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @dataProvider getThousandSeparatorResult
     * @param string $value
     * @param string $filteredValue
     */
    public function testWithThousandSeparator($value, $filteredValue)
    {
        $this->filter->value('test')->numberFormat(2, '.', ',');

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getTwoDecimalsAndDotResult()
    {
        return [
            ['', ''],
            ['1234567890', '1234567890.00'],
            ['4142.421', '4142.42'],
            ['a1s2d3f4g5h6j7k8l9;0', '0.00'],
        ];
    }

    /**
     * @return array
     */
    public function getThreeDecimalsAndCommaResult()
    {
        return [
            ['', ''],
            ['1234567890', '1234567890,000'],
            ['4142.421', '4142,421'],
            ['a1s2d3f4g5h6j7k8l9;0', '0,000'],
        ];
    }

    /**
     * @return array
     */
    public function getThousandSeparatorResult()
    {
        return [
            ['', ''],
            ['1234567890', '1,234,567,890.00'],
            ['4142.421', '4,142.42'],
            ['a1s2d3f4g5h6j7k8l9;0', '0.00'],
        ];
    }
}
