<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class RemoveTest extends \PHPUnit_Framework_TestCase
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
     * Test if a provided value gets unset completely
     */
    public function testKeyGetsRemoved()
    {
        $this->filter->value('test')->remove();

        $result = $this->filter->filter([
            'test' => 'test',
            'test2' => 'test',
        ]);

        $this->assertEquals(['test2' => 'test'], $result);
    }

    /**
     * Test that unset values remain unset
     */
    public function testRemoveOnNotExistingKey()
    {
        $this->filter->value('test')->remove();

        $result = $this->filter->filter([]);

        $this->assertEquals([], $result);
    }

    /**
     * Test that unset values remain unset with other filter values
     */
    public function testRemoveOnNotExistingKeyWithValues()
    {
        $this->filter->value('test')->remove();

        $result = $this->filter->filter(['test2' => 'test']);

        $this->assertEquals(['test2' => 'test'], $result);
    }
}