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
        $flags = new Flags();

        for($i = 0; $i< $schemas->schema_1->flag->count(); $i++){
            $flagName = $schemas->schema_1->flag[$i]->name;
            $flagAbv = $schemas->schema_1->flag[$i]->abbreviation;
            $flagDataType = $schemas->schema_1->flag[$i]->dataType;
            $this->listOfFlags[] = $flags->createFlagInstance($flagName, $flagAbv, $flagDataType);
        }
    }

    public function loadParameters($args)
    {
        $this->parametersList = explode(" ", $args);
        $this->verifyArguments();
    }

    private function verifyArguments(){

        for ($i = 0; $i < count($this->parametersList); $i++) {
            $this->listOfFlags[$i]->verify($this->parametersList[$i]);
        }
    }

    public function getArgumentValue($flagAbbreviation) {
        for ($i = 0; $i < count($this->listOfFlags); $i++) {
            if ($flagAbbreviation == $this->listOfFlags[$i]->getAbbreviation()) {
                echo "Value/s for flag : " .$flagAbbreviation . " is/are: " .$this->listOfFlags[$i]->getValue() . "\n";
            }
        }
    }

    public function displayAllArguments()
    {
        foreach ($this->listOfFlags as $flag){
            echo $flag->getAbbreviation() . ": " . $flag->getValue() ."\n";
        }
    }

}