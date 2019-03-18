<?php

namespace ArgsParser\Flags;

class Files implements IFlag
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
        $fileList = explode(",", $parameter);
        foreach ($fileList as $file) {
            try {
                if (!preg_match("/\./", $file)) {
                    throw new \Exception("Illegal argument type for File: " . $file."\n");
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