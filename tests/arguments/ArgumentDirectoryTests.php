<?php

namespace ArgsParserTest\arguments;

use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentDirectory;
use PHPUnit\Framework\TestCase;

class ArgumentDirectoryTests extends TestCase
{
    private $argumentDirectory;

    public function setUp()
    {
        $this->argumentDirectory = ArgumentObjectFactory::createArgumentObject('d');
    }

    /**
     * @test
     */
    public function getName_ReturnUser()
    {
        $argumentName = $this->argumentDirectory->getName();

        $this->assertEquals("Directory", $argumentName);
    }

    /**
     * @test
     */
    public function getAbbreviation_ReturnU()
    {
        $argumentAbbreviation = $this->argumentDirectory->getAbbreviation();

        $this->assertEquals("d", $argumentAbbreviation);
    }

    /**
     * @test
     */
    public function getUsage_ReturnProperUsage()
    {
        $argumentUsage = $this->argumentDirectory->getUsage();

        $this->assertEquals("-d /dir/.../target-dir/", $argumentUsage);
    }

    /**
     * @test
     */
    public function getType_ReturnString()
    {
        $argumentType = $this->argumentDirectory->getType();

        $this->assertEquals("string", $argumentType);
    }

    /**
     * @test
     */
    public function getStaticRegexPattern_ReturnProperPattern()
    {
        $argumentRegex = ArgumentDirectory::getRegexPattern();

        $this->assertEquals("(^([/]{1})([A-Za-z]([/]{1}[A-Za-z])*)+([/]{1})$)", $argumentRegex);
    }
}