<?php
namespace Particle\Tests\Filter;

use Particle\Filter\Filter;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Filter
     */
    protected $filter;

    public function setUp()
    {
        $this->filter = new Filter();
    }

    public function testReturnsValidatedValues()
    {
        // @todo: enable this one once the rules are present
        /*$this->filter->value('first_name')->trim()->lower()->ucfirst();
        $this->filter->value('last_name')->trim()->lower()->ucfirst();

        $result = $this->filter->filter([
            'first_name' => ' RiCk ',
            'last_name' => ' StAAIj   ',
        ]);

        $expected = [
            'first_name' => 'Rick',
            'last_name' => 'Staaij',
        ];

        $this->assertEquals($expected, $result);*/
        $this->assertTrue(true);
    }
}
