<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class RemoveNullTest extends \PHPUnit_Framework_TestCase
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

//    /**
//     * Test if a provided value gets unset completely
//     */
//    public function testKeyGetsRemovedWithUnset()
//    {
//        $this->filter->value('test')->removeNull();
//
//        $result = $this->filter->filter([
//            'test' => 'test',
//            'test2' => 'test',
//        ]);
//
//        $this->assertEquals(['test2' => 'test'], $result);
//    }
//
//    /**
//     * Test that unset values remain unset
//     */
//    public function testUnsetOnNotExistingKey()
//    {
//        $this->filter->value('test')->removeNull();
//
//        $result = $this->filter->filter([]);
//
//        $this->assertEquals([], $result);
//    }
//
//    /**
//     * Test that unset values remain unset with other filter values
//     */
//    public function testUnsetOnNotExistingKeyWithValues()
//    {
//        $this->filter->value('test')->removeNull();
//
//        $result = $this->filter->filter(['test2' => 'test']);
//
//        $this->assertEquals(['test2' => 'test'], $result);
//    }

    // @todo: add tests
}
