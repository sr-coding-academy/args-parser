<?php

namespace ArgsParser;

use ArgsParser\abstracts\ArgumentObject;
use ArgsParser\models\ArgumentObjectFactory;
use Exception;

class Register
{
    private $mockDB = [];

    public function __construct()
    {
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
        var_dump($this->mockDB);
    }

//    /**
//     * @param string $flag
//     * @param string[] $components
//     * @return void
//     */
//    private function saveComponentsFromList($flag, $components)
//    {
//
//    }

    /**
     * @return string[][] $this->data
     */
    public function getMockDB()
    {
        return $this->mockDB;
    }
}