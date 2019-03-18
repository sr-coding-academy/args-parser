<?php

namespace ArgsParser\Flags;

class Directory implements IFlag
{
    private $name;
    private $abbreviation;
    private $dataType;
    private $parameter;

    public function __construct($name, $abbreviation, $dataType)
    {
        $this->name = $name;
        $this->abbreviation = $abbreviation;
        $this->dataType = $dataType;
    }

    public function verify($parameter)
    {
        $this->parameter = $parameter;
        try {
            if (gettype($parameter) != $this->dataType || !preg_match("/^\//", $parameter)) {
                throw new \Exception("Illegal argument type for Directory \n");
            }
        } catch (\Exception $e) {
            echo $e;
        }
        return true;
    }

    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    public function getValue()
    {
        return $this->parameter;
    }
}