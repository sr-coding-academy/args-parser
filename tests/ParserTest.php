<?php

namespace ArgsParserTest;

use ArgsParser\Parser;
use ArgsParser\Register;
use ArgsParserTests\dataProviders\DataProviderParser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    /**
     * @var Parser
     */
    private $parser;

    /**
     * @var Register
     */
    private $register;

    public function setUp()
    {
        $this->register = new Register();
        $this->parser = new Parser($this->register);

    }

    /**
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderParser::providesForParse()
     * @param $expected
     * @param $input
     */
    public function testParse_ReturnValue_GivenItem($expected, $input)
    {
        $result = $this->parser->parse($input);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderParser::providesForAsk()
     * @param $preparedValues
     * @param $input
     * @param $expected
     */
    public function testAsk_ReturnEchoString_ValidFlag($preparedValues, $input, $expected)
    {
        $this->register->addValuesToRegister($preparedValues);
        $this->assertEquals($expected, $this->parser->ask($input));
    }
}