<?php

namespace ArgsParserTests\arguments;

use ArgsParser\arguments\ArgumentBool;
use PHPUnit\Framework\TestCase;

class ArgumentBoolTest extends TestCase
{
    /**
     * @var ArgumentBool
     */
    private $argumentBool;

    public function setUp()
    {
        $this->argumentBool = new ArgumentBool();
    }
    
    public function testDisplayValue_ReturnStringFalse()
    {
        $displayBoolValue = $this->argumentBool->displayValue();
        $this->assertEquals("false", $displayBoolValue);
    }

    public function testSetBoolTrue_DisplayValue_ReturnStringTrue()
    {
        $this->argumentBool->setValue(true);
        $displayBoolValue = $this->argumentBool->displayValue();
        $this->assertEquals("true", $displayBoolValue);
    }
}