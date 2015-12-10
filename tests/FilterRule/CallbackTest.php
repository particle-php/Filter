<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;
use Particle\Filter\FilterRule;

class CallbackTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getCallbackResults
     * @param mixed $value
     * @param callable $callable
     * @param mixed $filteredValue
     */
    public function testCallbackFilterRule($value, callable $callable, $filteredValue)
    {
        $this->filter->value('test')->callback($callable);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * Test if setting allowNotSet to true still runs if no value was set
     */
    public function testAllowNotSetCallback()
    {
        $this->filter->value('test')->callback(function () {
            $result = implode('.', range(1, 3));
            return $result;
        }, true);

        $result = $this->filter->filter([]);

        $this->assertEquals([
            'test' => '1.2.3',
        ], $result);
    }

    /**
     * Test if the value was not randomly created if not specifically asked for
     */
    public function testNotSetWhenNotAllowedNotSet()
    {
        $this->filter->value('test')->callback(function () {
            $result = implode('.', range(1, 3));
            return $result;
        });

        $result = $this->filter->filter([]);

        $this->assertEquals([], $result);
    }

    /**
     * Test if the callback can build values using other data provided in the filter data
     *
     * @dataProvider getMultiValueCallbackResults
     * @param array $values
     * @param callable $callable
     * @param mixed $filteredValue
     */
    public function testAccessFilterValuesInCallback($values, callable $callable, $filteredValue)
    {
        $this->filter->value('test')->callback($callable);

        $result = $this->filter->filter($values);

        $values['test'] = $filteredValue;
        $this->assertEquals($values, $result);
    }

    /**
     * @return array
     */
    public function getCallbackResults()
    {
        return [
            [
                'o',
                function ($value) {
                    return 'l' . $value . 'l';
                },
                'lol',
            ],
            [
                99,
                function ($value) {
                    return $value * 2;
                },
                198,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getMultiValueCallbackResults()
    {
        return [
            [
                [
                    'gender' => 'Sir',
                    'test' => 'John',
                    'last_name' => 'Doe',
                ],
                function ($value, $filterValues) {
                    return implode(' ', [$filterValues['gender'], $value, $filterValues['last_name']]);
                },
                'Sir John Doe',
            ],
            [
                [
                    'multiplier' => 10,
                    'test' => 50,
                ],
                function ($value, $filterValues) {
                    return $value * $filterValues['multiplier'];
                },
                500,
            ],
        ];
    }
}
