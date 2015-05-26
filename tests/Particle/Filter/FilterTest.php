<?php
namespace Particle\Tests\Filter;

use Particle\Filter\Filter;

class ValidatorTest extends \PHPUnit_Framework_TestCase
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
     * Test if filter->value() works properly
     */
    public function testFilterValueResult()
    {
        $this->filter->value('first_name')->trim();

        $result = $this->filter->filter([
            'first_name' => ' rick ',
            'last_name' => ' staaij ',
        ]);

        $expected = [
            'first_name' => 'rick',
            'last_name' => ' staaij ',
        ];

        $this->assertEquals($expected, $result);
        $this->assertTrue(true);
    }

    /**
     * Test if filter-all() works properly
     */
    public function testFilterAllResult()
    {
        $this->filter->all()->trim();

        $result = $this->filter->filter([
            'first_name' => ' rick ',
            'last_name' => ' staaij ',
        ]);

        $expected = [
            'first_name' => 'rick',
            'last_name' => 'staaij',
        ];

        $this->assertEquals($expected, $result);
    }

    /**
     * Test if combining multiple filters works
     */
    public function testMultipleFilters()
    {
        $this->filter->value('first_name')->trim()->lower()->upperFirst();

        $result = $this->filter->filter([
            'first_name' => ' RICK ',
        ]);

        $expected = [
            'first_name' => 'Rick',
        ];

        $this->assertEquals($expected, $result);
    }
}
