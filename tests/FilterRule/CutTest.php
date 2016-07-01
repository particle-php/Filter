<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class CutTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getCutResults
     * @param string        $value
     * @param string        $filteredValue
     * @param int           $start
     * @param int|null      $length
     * @param string|null   $encodingFormat
     */
    public function testCutFilterRule($value, $filteredValue, $start, $length, $encodingFormat)
    {
        if ($encodingFormat !== null) {
            $this->filter->setEncodingFormat($encodingFormat);
        }

        $this->filter->value('test')->cut($start, $length);

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getCutResults()
    {
        return [
            ['text is kindaaaaaaaa longggggggg', 'text is kind', 0, 12, null],
            ['text is kindaaaaaaaa longggggggg', 'gg', -2, null, null],
            ['Ce garçon est tombé par terre', 'Ce garçon est tombé', 0, 19, 'utf-8'],
            ['Τάχιστη αλώπηξ βαφής ψημένη γη', 'ψημένη', -9, 6, 'utf-8'],
        ];
    }
}
