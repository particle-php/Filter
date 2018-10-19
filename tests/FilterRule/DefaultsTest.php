<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class DefaultsTest extends TestCase
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
     * @dataProvider getDefaultValues
     * @param string $defaultValue
     */
    public function testValueDefaults($defaultValue)
    {
        $this->filter->value('test')->defaults($defaultValue);

        $result = $this->filter->filter([]);

        $this->assertSame([
            'test' => $defaultValue,
        ], $result);
    }

    /**
     * @dataProvider getDefaultValues
     * @param string $defaultValue
     */
    public function testDefaultIsIgnoredWhenValueIsSet($defaultValue)
    {
        $this->filter->value('test')->defaults($defaultValue);

        $result = $this->filter->filter([
            'test' => 'Doe'
        ]);

        $this->assertSame([
            'test' => 'Doe',
        ], $result);
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        return [
            [''],
            [0],
            ['John'],
            [null],
            [1000],
            [true],
        ];
    }
}
