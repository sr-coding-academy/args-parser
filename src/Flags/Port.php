<?php

namespace ArgsParser\Flags;

class Port implements IFlag
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
            if (!is_numeric($parameter)) {
                throw new \Exception("Illegal argument type for Port \n");
            }
        }
        catch(\Exception $e){
            echo $e;
            die();
        }
        return true;
    }

    public function getAbbreviation ()
    {
        return $this->abbreviation;
    }

    public function getValue()
    {
        return $this->parameter;
    }

    public function getName()
    {
        return $this->name;
    }
}