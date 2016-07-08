<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;

class EachTest extends \PHPUnit_Framework_TestCase
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

    public function testBasicEach()
    {
        $this->filter->value('test')->each(function (Filter $filter) {
            $filter->value('test')->upper();
            $filter->value('test2')->lower();
        });

        $result = $this->filter->filter([
            'test' => [
                [
                    'test' => 'lower',
                    'test2' => 'UPPER'
                ],
                [
                    'test' => 'john',
                    'test2' => 'DOE',
                ],
            ],
        ]);

        $this->assertSame([
            'test' => [
                [
                    'test' => 'LOWER',
                    'test2' => 'upper'
                ],
                [
                    'test' => 'JOHN',
                    'test2' => 'doe',
                ],
            ],
        ], $result);
    }

    public function testEachDoesNotDoAnythingWhenNotArray()
    {
        $this->filter->value('test')->each(function (Filter $filter) {
            $filter->value('test')->upper();
            $filter->value('test2')->lower();
        });

        $result = $this->filter->filter([
            'test' => 'test',
        ]);

        $this->assertSame([
            'test' => 'test',
        ], $result);
    }
}
