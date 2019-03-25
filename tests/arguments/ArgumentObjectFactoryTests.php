<?php

namespace ArgsParserTest\arguments;

use ArgsParser\arguments\ArgumentDirectory;
use ArgsParser\arguments\ArgumentIntegerList;
use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentPort;
use ArgsParser\arguments\ArgumentStringList;
use ArgsParser\arguments\ArgumentUser;
use ArgsParser\exceptions\ArgumentObjectException;
use PHPUnit\Framework\TestCase;

class ArgumentObjectFactoryTests extends TestCase
{

    /**
     * @test
     */
    public function createArgumentObject_ReturnArgument_UserFlagIsU()
    {
        $argumentUser = ArgumentObjectFactory::createArgumentObject('u');
        $this->assertInstanceOf(ArgumentUser::class, $argumentUser);
    }

    /**
     * @test
     */
    public function createArgumentObject_ReturnArgumentDirectory_FlagIsD()
    {
        $argumentDirectory = ArgumentObjectFactory::createArgumentObject('d');
        $this->assertInstanceOf(ArgumentDirectory::class, $argumentDirectory);
    }

    /**
     * @test
     */
    public function createArgumentObject_ReturnArgumentPort_FlagIsP()
    {
        $argumentPort = ArgumentObjectFactory::createArgumentObject('p');
        $this->assertInstanceOf(ArgumentPort::class, $argumentPort);
    }

    /**
     * @test
     */
    public function createArgumentObject_ReturnArgumentIntegerList_FlagIsI()
    {
        $argumentIntegerList = ArgumentObjectFactory::createArgumentObject('i');
        $this->assertInstanceOf(ArgumentIntegerList::class, $argumentIntegerList);
    }

    /**
     * @test
     */
    public function createArgumentObject_ReturnArgumentIntegerList_FlagIsF()
    {
        $argumentPort = ArgumentObjectFactory::createArgumentObject('f');
        $this->assertInstanceOf(ArgumentStringList::class, $argumentPort);
    }

    /**
     * @test
     */
    public function createArgumentObject_throwsArgumentObjectException_FlagIsInvalid()
    {
        $this->expectException(ArgumentObjectException::class);
        ArgumentObjectFactory::createArgumentObject('invalid');
    }
}