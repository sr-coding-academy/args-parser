<?php

namespace ArgsParser;

use ArgsParser\abstracts\ArgumentObject;
use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentBool;
use Exception;

class Register
{
    private $mockDB = [];

    /**
     * Register constructor.
     */
    public function __construct()
    {
        $this->mockDB[] = new ArgumentBool();
    }

    /**
     * @param string $flag
     * @param mixed $value
     */
    public function addValuesToRegister($flag, $value)
    {
        try {
            /** @var ArgumentObject $argumentObject */
            $argumentObject = ArgumentObjectFactory::createArgumentObject($flag);
            $argumentObject->setValue($value);
            $this->mockDB[] = $argumentObject;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return string[][] $this->data
     */
    public function getMockDB()
    {
        return $this->mockDB;
    }

    public function setBoolTrue()
    {
        /** @var ArgumentBool $argumentBool */
        foreach ($this->mockDB as $argumentBool) {
            if ($argumentBool->getAbbreviation() === 'l') {
                $argumentBool->setValue(true);
            }
        }
    }
}