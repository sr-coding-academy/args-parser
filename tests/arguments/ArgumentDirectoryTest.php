<?php

namespace ArgsParserTest\arguments;

use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentDirectory;
use PHPUnit\Framework\TestCase;

class ArgumentDirectoryTest extends TestCase
{
    private $argumentDirectory;

    public function setUp()
    {
        $this->argumentDirectory = ArgumentObjectFactory::createArgumentObject('d');
    }

    public function testGetName_ReturnUser()
    {
        $argumentName = $this->argumentDirectory->getName();

        $this->assertEquals("Directory", $argumentName);
    }

    public function testGetAbbreviation_ReturnU()
    {
        $argumentAbbreviation = $this->argumentDirectory->getAbbreviation();

        $this->assertEquals("d", $argumentAbbreviation);
    }

    public function testGetUsage_ReturnProperUsage()
    {
        $argumentUsage = $this->argumentDirectory->getUsage();

        $this->assertEquals("-d /dir/.../target-dir/", $argumentUsage);
    }

    public function testGetType_ReturnString()
    {
        $argumentType = $this->argumentDirectory->getType();

        $this->assertEquals("string", $argumentType);
    }

    public function testGetStaticRegexPattern_ReturnProperPattern()
    {
        $argumentRegex = ArgumentDirectory::getRegexPattern();

        $this->assertEquals("(^([/]{1})([A-Za-z]([/]{1}[A-Za-z])*)+([/]{1})$)", $argumentRegex);
    }
}