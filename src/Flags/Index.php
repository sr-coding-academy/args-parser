<?php

namespace ArgsParser\Flags;

class Index implements IFlag
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
        $indexList = explode(",", $parameter);
        foreach ($indexList as $index) {
            try {
                if (!is_numeric($index)) {
                    throw new \Exception("Illegal argument type for Index: " . $index. "\n");
                }
            } catch (\Exception $e) {
                echo $e;
            }
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