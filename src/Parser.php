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
    private $parametersList = [];
    private $listOfFlags = [];

    public function loadSchema($fileName)
    {
        $mySchema = new Schema($fileName);
        $schemas = $mySchema->loadSchema();

        for($i = 0; $i< $schemas->schema_1->flag->count(); $i++){
            $flagName = $schemas->schema_1->flag[$i]->name;
            $flagAbv = $schemas->schema_1->flag[$i]->abbreviation;
            $flagDataType = $schemas->schema_1->flag[$i]->dataType;
            $this->listOfFlags[] = new Flags($flagName, $flagAbv, $flagDataType);
        }

    }

    public function loadParameters($args)
    {
        $this->parametersList = explode(" ", $args);
        var_dump($this->parametersList);
        $this->verify();
    }

    private function verifyArguments(){
    }

    public function displayList()
    {
        return $this->parametersList;
    }

    public function displayArgument($flag){
        return $this->parametersList[$flag];
    }
}