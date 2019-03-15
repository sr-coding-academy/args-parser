<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 15/03/2019
 * Time: 13:22
 */

namespace ArgsParser;


class Parser
{
    private $input;
    private $newFormat;

    public function __construct($input)
    {
        $this->input = $input;
        $this->formatInput();

        $newschema = new Schema("schema.xml");
        var_dump($newschema->loadSchema());
    }

    private function formatInput()
    {
        $this->newFormat = explode(" ",$this->input);
    }

    public function getArgument($flag)
    {
        if($flag != "-l"){
            $keyOfFlag = array_search($flag, $this->newFormat);
            $argument = $this->listOfArguments($keyOfFlag + 1);
            return $argument;
        }
        elseif(in_array("-l", $this->newFormat) && $flag === "-l"){
            return "TRUE";
        }
        elseif(!in_array("-l", $this->newFormat)){
            return "FALSE";
        }


    }

    private function listOfArguments($position)
    {
        $arguments = explode("," ,$this->newFormat[$position]);
        return $arguments;
    }
}