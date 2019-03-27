<?php

namespace ArgsParserTest;

use ArgsParser\arguments\ArgumentBool;
use ArgsParser\exceptions\ArgumentObjectException;
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

    /**
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderRegisterTest::providesParsedInputsWithFalseFlagsForAddValuesToRegister()
     * @param $parsedInput
     */
    public function testAddValuesToRegister_ThrowException_IfInvalidFlagWasGiven($parsedInput)
    {
        $this->expectException(ArgumentObjectException::class);
        $this->register->addValuesToRegister($parsedInput);
    }

    public function testSetBoolTrueNotCalled_ReturnFalse() {
        $register = $this->register->getRegister();
        $boolValue = false;

        /** @var ArgumentBool $argumentBool */
        foreach ($register as $argumentBool) {
            if ($argumentBool->getAbbreviation() === 'l') {
                $boolValue = $argumentBool->getValue();
            }
        }

        $this->assertNotTrue($boolValue);
    }

    public function testSetBoolTrue_ReturnTrue()
    {
        $this->register->setBoolTrue();
        $register = $this->register->getRegister();
        $boolValue = false;

        /** @var ArgumentBool $argumentBool */
        foreach ($register as $argumentBool) {
            if ($argumentBool->getAbbreviation() === 'l') {
                $boolValue = $argumentBool->getValue();
            }
        }

        $this->assertTrue($boolValue);
    }
}