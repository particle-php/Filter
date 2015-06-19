<?php
namespace Particle\Tests\Filter\FilterRule;

use Particle\Filter\Filter;

class LowerTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider getLowerResults
     * @param string $value
     * @param string $filteredValue
     * @param string|null $encodingFormat
     */
    public function testLowerFilterRule($value, $filteredValue, $encodingFormat)
    {
        if ($encodingFormat !== null) {
            $this->filter->setEncodingFormat($encodingFormat);
        }

        $this->filter->value('test')->lower();

        $result = $this->filter->filter([
            'test' => $value
        ]);

        $this->assertEquals($result['test'], $filteredValue);
    }

    /**
     * @return array
     */
    public function getLowerResults()
    {
        return [
            ['text is low', 'text is low', null],
            ['', '', null],
            ['LOL', 'lol', null],
            ['L0L', 'l0l', null],
            ['~!LoLz!~', '~!lolz!~', null],
            ['CE GARÇON EST TOMBÉ', 'ce garçon est tombé', 'utf-8'],
            ['Τάχιστη αλώπηξ βαφής ψημένη γη', 'τάχιστη αλώπηξ βαφής ψημένη γη', 'utf-8'],
        ];
    }
}
