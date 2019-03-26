<?php

namespace ArgsParserTest\arguments;

use ArgsParser\abstracts\ArgumentObject;
use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentPort;
use PHPUnit\Framework\TestCase;

class ArgumentPortTest extends TestCase
{
    /**
     * @var ArgumentObject
     */
    private $argumentPort;

    /**
     * @throws \ArgsParser\exceptions\ArgumentObjectException
     */
    public function setUp()
    {
        $this->argumentPort = ArgumentObjectFactory::createArgumentObject('p');
    }

    /**
     * @test
     */
    public function getName_ReturnUser()
    {
        $argumentName = $this->argumentPort->getName();
        $this->assertEquals("Port", $argumentName);
    }

    /**
     * @test
     */
    public function getAbbreviation_ReturnU()
    {
        $argumentAbbreviation = $this->argumentPort->getAbbreviation();
        $this->assertEquals("p", $argumentAbbreviation);
    }

    /**
     * @test
     */
    public function getUsage_ReturnProperUsage()
    {
        $argumentUsage = $this->argumentPort->getUsage();
        $this->assertEquals("-p port (1024 < port < 65535)", $argumentUsage);
    }

    /**
     * @test
     */
    public function getType_ReturnString()
    {
        $argumentType = $this->argumentPort->getType();
        $this->assertEquals("integer", $argumentType);
    }

    /**
     * @test
     */
    public function getStaticRegexPattern_ReturnProperPattern()
    {
        $argumentRegex = ArgumentPort::getRegexPattern();
        $this->assertEquals("(([0-9]{4,}){1})", $argumentRegex);
    }
}