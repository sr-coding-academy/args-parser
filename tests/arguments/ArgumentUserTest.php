<?php

namespace ArgsParserTest\arguments;

use ArgsParser\abstracts\ArgumentObject;
use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentUser;
use PHPUnit\Framework\TestCase;

class ArgumentUserTest extends TestCase
{
    /**
     * @var ArgumentObject
     */
    private $argumentUser;

    /**
     * @throws \ArgsParser\exceptions\ArgumentObjectException
     */
    public function setUp()
    {
        $this->argumentUser = ArgumentObjectFactory::createArgumentObject('u');
    }

    /**
     * @test
     */
    public function getName_ReturnUser()
    {
        $argumentName = $this->argumentUser->getName();

        $this->assertEquals("User", $argumentName);
    }

    /**
     * @test
     */
    public function getAbbreviation_ReturnU()
    {
        $argumentAbbreviation = $this->argumentUser->getAbbreviation();

        $this->assertEquals("u", $argumentAbbreviation);
    }

    /**
     * @test
     */
    public function getUsage_ReturnProperUsage()
    {
        $argumentUsage = $this->argumentUser->getUsage();

        $this->assertEquals("-u name (at least 3 characters, no special chars.)", $argumentUsage);
    }

    /**
     * @test
     */
    public function getType_ReturnString()
    {
        $argumentType = $this->argumentUser->getType();

        $this->assertEquals("string", $argumentType);
    }

    /**
     * @test
     */
    public function getStaticRegexPattern_ReturnProperPattern()
    {
        $argumentRegex = ArgumentUser::getRegexPattern();

        $this->assertEquals("(([A-Za-z]{3,}){1})", $argumentRegex);
    }
}