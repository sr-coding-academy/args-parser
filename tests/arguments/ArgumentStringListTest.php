<?php

namespace ArgsParserTest\arguments;

use ArgsParser\abstracts\ArgumentObject;
use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentStringList;
use PHPUnit\Framework\TestCase;

class ArgumentStringListTest extends TestCase
{
    /**
     * @var ArgumentObject
     */
    private $argumentStringList;

    /**
     * @throws \ArgsParser\exceptions\ArgumentObjectException
     */
    public function setUp()
    {
        $this->argumentStringList = ArgumentObjectFactory::createArgumentObject('u');
    }

    /**
     * @test
     */
    public function getName_ReturnUser()
    {
        $argumentName = $this->argumentStringList->getName();

        $this->assertEquals("User", $argumentName);
    }

    /**
     * @test
     */
    public function getAbbreviation_ReturnU()
    {
        $argumentAbbreviation = $this->argumentStringList->getAbbreviation();

        $this->assertEquals("u", $argumentAbbreviation);
    }

    /**
     * @test
     */
    public function getUsage_ReturnProperUsage()
    {
        $argumentUsage = $this->argumentStringList->getUsage();

        $this->assertEquals("-u name (at least 3 characters, no special chars.)", $argumentUsage);
    }

    /**
     * @test
     */
    public function getType_ReturnString()
    {
        $argumentType = $this->argumentStringList->getType();

        $this->assertEquals("string", $argumentType);
    }

    /**
     * @test
     */
    public function getStaticRegexPattern_ReturnProperPattern()
    {
        $argumentRegex = ArgumentStringList::getRegexPattern();

        $this->assertEquals("([A-Za-z0-9._/-]+([,]{1}[A-Za-z0-9._/-]+)*)", $argumentRegex);
    }
}