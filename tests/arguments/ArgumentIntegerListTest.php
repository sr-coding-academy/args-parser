<?php

namespace ArgsParserTest\arguments;

use ArgsParser\abstracts\ArgumentObject;
use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentIntegerList;
use PHPUnit\Framework\TestCase;

class ArgumentIntegerListTest extends TestCase
{
    /**
     * @var ArgumentObject
     */
    private $argumentIntegerList;

    /**
     * @throws \ArgsParser\exceptions\ArgumentObjectException
     */
    public function setUp()
    {
        $this->argumentIntegerList = ArgumentObjectFactory::createArgumentObject('i');
    }

    /**
     * @test
     */
    public function getName_ReturnUser()
    {
        $argumentName = $this->argumentIntegerList->getName();
        $this->assertEquals("Integer list", $argumentName);
    }

    /**
     * @test
     */
    public function getAbbreviation_ReturnU()
    {
        $argumentAbbreviation = $this->argumentIntegerList->getAbbreviation();
        $this->assertEquals("i", $argumentAbbreviation);
    }

    /**
     * @test
     */
    public function getUsage_ReturnProperUsage()
    {
        $argumentUsage = $this->argumentIntegerList->getUsage();
        $this->assertEquals("-i 0,1,2,3,...", $argumentUsage);
    }

    /**
     * @test
     */
    public function getType_ReturnString()
    {
        $argumentType = $this->argumentIntegerList->getType();
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