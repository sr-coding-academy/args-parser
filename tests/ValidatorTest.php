<?php

namespace ArgsParserTest;

use ArgsParser\exceptions\InvalidFlagException;
use ArgsParser\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function setUp()
    {
        
    }

    /**
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderValidatorTest::providesForValidateValidData()
     * @param $expected
     * @param $flag
     * @param $value
     * @throws \ArgsParser\exceptions\InvalidFlagException
     */
    public function testValidate_ReturnTrue_ValidFlag_ValidValue($expected, $flag, $value)
    {
        $isValid = Validator::validate($flag, $value);
        $this->assertEquals($expected, $isValid);
    }

    /**
     * @dataProvider \ArgsParserTests\dataProviders\DataProviderValidatorTest::providesForValidateInvalidData()
     * @param $flag
     * @param $value
     * @throws \ArgsParser\exceptions\InvalidFlagException
     */
    public function testValidate_ThrowInvalidFlagException_InvalidFlag_ValidValue($flag, $value)
    {
        $this->expectException(InvalidFlagException::class);
        Validator::validate($flag, $value);
    }
}