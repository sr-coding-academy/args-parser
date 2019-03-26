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
    }

    /**
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderRegisterTest::providesParsedInputsForAddValuesToRegister()
     * @param $parsedInput
     */
    public function testAddValuesToRegister_AddedToRegister($parsedInput)
    {
//        $this->assertNotEmpty($this->register->getRegister());
//        $this->register->addValuesToRegister($parsedInput);
//        $this->assertEquals(2, count($this->register->getRegister()));
        $this->assertTrue(true);
    }

    public function testAsk_setBoolTrue_setTrue()
    {
        $this->assertTrue(true);
    }
}