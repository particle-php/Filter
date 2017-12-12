<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;

class DecodeJSONTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getTestParams
     * @param mixed $value
     * @param bool $assoc
     * @param int $depth
     * @param int $options
     * @param mixed $filteredValue
     */
    public function testDecodeJSONFilterRule($value, $assoc, $depth, $options, $filteredValue)
    {
        $this->filter->value('test')->decodeJSON($assoc, $depth, $options);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    public function testDecodeJSONFilterRuleWithBigInt()
    {
        $this->filter->value('test1')->decodeJSON(false, 100, 0);
        $this->filter->value('test2')->decodeJSON(false, 100, JSON_BIGINT_AS_STRING);

        $result = $this->filter->filter([
            'test1' => '1000000000000000000000000000000',
            'test2' => '1000000000000000000000000000000'
        ]);

        $this->assertInternalType('float', $result['test1']);
        $this->assertInternalType('string', $result['test2']);
    }

    /**
     * @return array
     */
    public function getTestParams()
    {
        return [
            // Ordinary JSON
            [
                '{"string": "foo", "int": 100500, "array": [false, true, null]}',
                false,
                100,
                0,
                (object)['string' => 'foo', 'int' => 100500, 'array' => [false, true, null]]
            ],
            ['"Hello"', false, 100, 0, 'Hello'],
            ['1999', false, 100, 0, 1999],

            // Using the assoc parameter
            ['{"string": "foo", "int": 100500}', true, 100, 0, ['string' => 'foo', 'int' => 100500]],

            // Using the depth parameter
            ['{"1": {"2": {"3": {"4": "the end"}}}}', true, 100, 0, [1 => [2 => [3 => [4 => "the end"]]]]],
            ['{"1": {"2": {"3": {"4": "the end"}}}}', true, 3, 0, null],

            // Incorrect JSON
            ['I am not a JSON', false, 100, 0, null],
            ['', false, 100, 0, null],

            // Not a string
            [null, false, 100, 0, null],
            [3456, false, 100, 0, 3456],
        ];
    }
}
