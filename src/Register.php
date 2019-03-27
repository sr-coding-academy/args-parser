<?php

namespace ArgsParser;

use ArgsParser\abstracts\ArgumentObject;
use ArgsParser\arguments\ArgumentObjectFactory;
use ArgsParser\arguments\ArgumentBool;
use Exception;

class Register
{
    private $register = [];

    /**
     * Register constructor.
     */
    public function __construct()
    {
        $this->register[] = new ArgumentBool();
    }

    /**
     * @param array $parsedInput
     */
    public function addValuesToRegister($parsedInput)
    {
        try {
            foreach ($parsedInput as $flag => $values) {
                foreach ($values as $value) {
                    /** @var ArgumentObject $argumentObject */
                    $argumentObject = ArgumentObjectFactory::createArgumentObject($flag);
                    $argumentObject->setValue($value);
                    $this->register[] = $argumentObject;
                }
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function setBoolTrue()
    {
        /** @var ArgumentBool $argumentBool */
        foreach ($this->register as $argumentBool) {
            if ($argumentBool->getAbbreviation() === 'l') {
                $argumentBool->setValue(true);
            }
        }
    }

    /**
     * @return string[][] $this->data
     */
    public function getRegister()
    {
        return $this->register;
    }
}