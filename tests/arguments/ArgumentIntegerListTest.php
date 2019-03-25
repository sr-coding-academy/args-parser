<?php

namespace ArgsParserTest\arguments;

use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentIntegerList;
use PHPUnit\Framework\TestCase;

class ArgumentIntegerListTest extends TestCase
{
    private $argumentIntergerList;

    public function setUp()
    {
        $this->argumentIntergerList = ArgumentObjectFactory::createArgumentObject('i');
    }

    /**
     * @test
     */
    public function getName_ReturnUser()
    {
        $argumentName = $this->argumentIntergerList->getName();

        $this->assertEquals("Integer list", $argumentName);
    }

    /**
     * @test
     */
    public function getAbbreviation_ReturnU()
    {
        $argumentAbbreviation = $this->argumentIntergerList->getAbbreviation();

        $this->assertEquals("i", $argumentAbbreviation);
    }

    /**
     * @test
     */
    public function getUsage_ReturnProperUsage()
    {
        $argumentUsage = $this->argumentIntergerList->getUsage();

        $this->assertEquals("-i 0,1,2,3,...", $argumentUsage);
    }

    /**
     * @test
     */
    public function getType_ReturnString()
    {
        $argumentType = $this->argumentIntergerList->getType();

        $this->assertEquals("integer list", $argumentType);
    }

    /**
     * @test
     */
    public function getStaticRegexPattern_ReturnProperPattern()
    {
        $argumentRegex = ArgumentIntegerList::getRegexPattern();

        $this->assertEquals("([-]?[0-9]+([,]{1}[-]?[0-9]+)*)", $argumentRegex);
    }
}