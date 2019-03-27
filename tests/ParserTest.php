<?php

namespace ArgsParserTest;

use ArgsParser\Parser;
use ArgsParser\Register;
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
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderParserTest::providesForParse()
     * @param $expected
     * @param $input
     * @throws \ArgsParser\InvalidValueException
     */
    public function testParse_ReturnValue_GivenItem($expected, $input)
    {
        $result = $this->parser->parse($input);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderParserTest::providesForAsk()
     * @param $preparedValues
     * @param $input
     * @param $expected
     */
    public function testAsk_ReturnEchoString_ValidFlag($preparedValues, $input, $expected)
    {
        $this->register->addValuesToRegister($preparedValues);
        $this->assertEquals($expected, $this->parser->ask($input));
    }

    /**
     * @throws \ReflectionException
     */
    public function testParseBool_ReturnInputWithoutBool_IfBoolIsSet()
    {
        $outcome = $this->invokeMethod($this->parser, 'parseBool', ["-u root -l"]);

        $this->assertEquals("-u root ", $outcome);
    }

    /**
     * @throws \ReflectionException
     */
    public function testParseBool_ReturnInputWithoutBool_IfBoolNotSet()
    {
        $outcome = $this->invokeMethod($this->parser, 'parseBool', ["-u root"]);

        $this->assertEquals("-u root", $outcome);
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     * @throws \ReflectionException
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}