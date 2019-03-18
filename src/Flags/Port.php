<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 15/03/2019
 * Time: 16:24
 */

namespace ArgsParser\Flags;


class Port implements IFlag
{
    private $name;
    private $abbreviation;
    private $dataType;
    private $parameter;

    public function __construct($name, $abbreviation, $dataType)
    {
        // TODO: Implement loadArguments() method.

        $this->name = $name;
        $this->abbreviation = $abbreviation;
        $this->dataType = $dataType;
    }

    public function verify($parameter) {
        $this->parameter = $parameter;
        try {
            if (!is_numeric($parameter)) {
                throw new \Exception("Illegal argument type for Port");
            }
        }
        catch(\Exception $e){
            echo $e;
        }
    }

    public function getAbbreviation () {
        return $this->abbreviation;
    }

    public function getValue() {
        return $this->parameter;
    }
}