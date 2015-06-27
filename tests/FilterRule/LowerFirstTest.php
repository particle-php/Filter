<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class LowerFirstTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getLowerFirstResults
     * @param string $value
     * @param string $filteredValue
     * @param string|null $encodingFormat
     */
    public function testLowerFirstFilterRule($value, $filteredValue, $encodingFormat)
    {
        if ($encodingFormat !== null) {
            $this->filter->setEncodingFormat($encodingFormat);
        }

        $this->filter->value('test')->lowerFirst();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getLowerFirstResults()
    {
        return [
            ['', '', null],
            ['TEXT IS HIGH', 'tEXT IS HIGH', null],
            ['L0L', 'l0L', null],
            ['~!LOLZ!~', '~!LOLZ!~', null],
            ['ÇON EST TOMBÉ', 'çON EST TOMBÉ', 'utf-8'],
            ['ΤΆΧΙΣΤΗ ΑΛΏΠΗΞ ΒΑΦΉΣ ΨΗΜΈΝΗ ΓΗ', 'τΆΧΙΣΤΗ ΑΛΏΠΗΞ ΒΑΦΉΣ ΨΗΜΈΝΗ ΓΗ', 'utf-8'],
        ];
    }
}
