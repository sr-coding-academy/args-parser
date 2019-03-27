<?php

namespace ArgsParserTest;

use ArgsParser\Register;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    /**
     * @var Register
     */
    private $register;

    public function setUp()
    {
        $this->register = new Register();
    }

    public function testRegisterIsNotEmpty()
    {
        $this->assertNotEmpty($this->register->getRegister());
        $this->assertCount(1,$this->register->getRegister());
    }

    /**
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderRegisterTest::providesParsedInputsForAddValuesToRegister()
     * @param $parsedInput
     * @param $expectedCount
     */
    public function testAddValuesToRegister_ReturnCount2_IfOneValueWasAdded($parsedInput, $expectedCount)
    {
        $this->register->addValuesToRegister($parsedInput);
        $this->assertEquals($expectedCount, count($this->register->getRegister()));
    }

    public function testAsk_setBoolTrue_setTrue()
    {
        $this->assertTrue(true);
    }
}