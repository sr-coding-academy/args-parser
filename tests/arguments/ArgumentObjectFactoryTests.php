<?php

namespace ArgsParserTest\arguments;


use ArgsParser\arguments\ArgumentObjectFactory;

class ArgumentObjectFactoryTests
{
    /**
     * @test
     */
    public function createArgumentObjectReturnArgumentUserFlagIsU()
    {
        $argumentUser = ArgumentObjectFactory::createArgumentObject('u');

        $this->assertInstanceOf('ArgumentUser', $argumentUser);
    }
}