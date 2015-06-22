<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

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
                'lol'
            ],
            [
                99,
                function ($value) {
                    return $value * 2;
                },
                198
            ],
        ];
    }
}
