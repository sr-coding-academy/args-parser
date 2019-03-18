<?php

namespace ArgsParser;

class Parser
{
    private $listOfParameters = [];
    private $listOfFlags = [];

    public function loadSchema($fileName, $schemaName)
    {
        $schemaLoader = new SchemaLoader($fileName);
        $schema = $schemaLoader->getSchema($schemaName);
        $this->loadFlags($schema);
    }

    /**
     * Load flags from the defined schema into the list of flags
     */
    private function loadFlags($schema)
    {
        $flagFactory = new FlagFactory();
        for ($i = 0; $i < $schema->flag->count(); $i++) {
            $flagName = $schema->flag[$i]->name;
            $flagAbv = $schema->flag[$i]->abbreviation;
            $flagDataType = $schema->flag[$i]->dataType;
            $this->listOfFlags[] = $flagFactory->createFlag($flagName, $flagAbv, $flagDataType);
            if ($flagName == "Logging") {
                $this->listOfParameters[$i] = "TRUE";
            }
        }
    }

    public function loadParameters($args)
    {
        $argsList = explode(" ", $args);
        $numberOfArguments = sizeof($argsList) + sizeof($this->listOfParameters);

        if(sizeof($this->listOfFlags) != $numberOfArguments){
            echo "Illegal number of arguments! \n";
            die();
        }

        for ($i = 0; $i < $numberOfArguments; $i++) {
            if (!isset($this->listOfParameters[$i])) {
                $this->listOfParameters[$i] = $argsList[$i];
            }
        }

        $this->verifyArguments();
    }

    private function verifyArguments()
    {
        for ($i = 0; $i < count($this->listOfParameters); $i++) {
            $this->listOfFlags[$i]->verify($this->listOfParameters[$i]);
        }
    }

    public function getParameterFromFlag($flagAbbreviation)
    {
        try {
            $parameterValue = "";
            for ($i = 0; $i < count($this->listOfFlags); $i++) {
                if ($flagAbbreviation == $this->listOfFlags[$i]->getAbbreviation()) {
                    $parameterValue = $this->listOfFlags[$i]->getValue();
                    echo "Value/s for flag : " . $flagAbbreviation . " is/are: " . $parameterValue . "\n";
                }
            }
            if(empty($parameterValue)){
                throw new \Exception("No such flag was defined in the schema!\n");
            }
        } catch(\Exception $e) {
            echo $e;
        }
    }

    public function displayAllParameters()
    {
        foreach ($this->listOfFlags as $flag) {
            echo $flag->getAbbreviation() . ": " . $flag->getValue() . "\n";
        }
        echo "\n";
    }

}