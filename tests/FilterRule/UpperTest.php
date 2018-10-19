<?php
namespace Particle\Filter\Tests\FilterRule;

use Particle\Filter\Filter;
use PHPUnit\Framework\TestCase;

class UpperTest extends TestCase
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
     * @dataProvider getUpperResults
     * @param string $value
     * @param string $filteredValue
     * @param string|null $encodingFormat
     */
    public function testUpperFilterRule($value, $filteredValue, $encodingFormat)
    {
        if ($encodingFormat !== null) {
            $this->filter->setEncodingFormat($encodingFormat);
        }

        $this->filter->value('test')->upper();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($filteredValue, $result['test']);
    }

    /**
     * @return array
     */
    public function getUpperResults()
    {
        return [
            ['', '', null],
            ['text is up', 'TEXT IS UP', null],
            ['l0l', 'L0L', null],
            ['~!LoLz!~', '~!LOLZ!~', null],
            ['ce garçon est tombé', 'CE GARÇON EST TOMBÉ', 'utf-8'],
            ['τάχιστη αλώπηξ βαφής ψημένη γη', 'ΤΆΧΙΣΤΗ ΑΛΏΠΗΞ ΒΑΦΉΣ ΨΗΜΈΝΗ ΓΗ', 'utf-8'],
        ];
    }
}
