<?php
namespace Particle\Tests;

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
        //$this->filter->value('first_name')->trim()->lower()->ucfirst();
        //$this->filter->value('last_name')->trim()->lower()->ucfirst();

        $result = []; /*$this->filter->filter([
            'first_name' => ' HeNk ',
            'last_name' => ' banaan',
        ]);*/

        $expected = [
            'first_name' => 'Henk',
            'last_name' => 'Banaan',
        ];

        $this->assertEquals($expected, $result);
    }
}
