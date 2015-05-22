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
        //$this->filter->value('first_name')->trim()->lower()->ucfirst(); @todo
        //$this->filter->value('last_name')->trim()->lower()->ucfirst(); @todo

        $result = []; /*$this->filter->filter([ @todo
            'first_name' => ' HeNk ',
            'last_name' => ' banaan',
        ]);*/

        $expected = []; /*[ @todo
            'first_name' => 'Henk',
            'last_name' => 'Banaan',
        ];*/

        $this->assertEquals($expected, $result);
    }
}
