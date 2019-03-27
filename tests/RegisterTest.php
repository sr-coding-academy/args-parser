<?php

namespace ArgsParserTest;

use ArgsParser\arguments\ArgumentBool;
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

    public function testSetBoolTrueNotCalled_ReturnFalse() {
        $boolValue = $this->getBoolOfRegister($this->register->getRegister());

        $this->assertNotTrue($boolValue);
    }

    public function testSetBoolTrue_ReturnTrue()
    {
        $this->register->setBoolTrue();
        $boolValue = $this->getBoolOfRegister($this->register->getRegister());

        $this->assertTrue($boolValue);
    }

    /**
     * @param array $register
     * @return bool
     */
    private function getBoolOfRegister($register)
    {
        $boolValue = false;
        /** @var ArgumentBool $argumentBool */
        foreach ($register as $argumentBool) {
            if ($argumentBool->getAbbreviation() === 'l') {
                $boolValue = $argumentBool->getValue();
            }
        }
        return $boolValue;
    }
}