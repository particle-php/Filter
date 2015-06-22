<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class UpperFirstTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getUpperFirstResults
     * @param string $value
     * @param string $filteredValue
     * @param string|null $encodingFormat
     */
    public function testUpperFirstFilterRule($value, $filteredValue, $encodingFormat)
    {
        if ($encodingFormat !== null) {
            $this->filter->setEncodingFormat($encodingFormat);
        }

        $this->filter->value('test')->upperFirst();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getUpperFirstResults()
    {
        return [
            ['', '', null],
            ['text is low', 'Text is low', null],
            ['l0l', 'L0l', null],
            ['~!lolz!~', '~!lolz!~', null],
            ['çon est tombé', 'Çon est tombé', 'utf-8'],
            ['τάχιστη αλώπηξ βαφής ψημένη γη', 'Τάχιστη αλώπηξ βαφής ψημένη γη', 'utf-8'],
        ];
    }
}
