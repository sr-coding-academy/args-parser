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
        }
    }

    public function loadParameters($args)
    {
        $argsList = explode(" ", $args);
        $argsList = $this->loadParameterlessFlagsValue($argsList);
        $numberOfArguments = count($argsList);
        if(count($this->listOfFlags) != $numberOfArguments){
            echo "Illegal number of arguments! \n";
            die();
        }
        $this->listOfParameters = $argsList;
    }

    // Load the default value for flags that do not require a parameter
    private function loadParameterlessFlagsValue($argsList){
        for($i = 0; $i < count($this->listOfFlags); $i++){
            $flag = $this->listOfFlags[$i];
            if($flag->getAbbreviation() == "-l"){
                array_splice($argsList, $i, 0, "TRUE");
            }
        }
        return $argsList;
    }

    public function verifyArguments()
    {
        for ($i = 0; $i < count($this->listOfParameters); $i++) {
            $this->listOfFlags[$i]->verify($this->listOfParameters[$i]);
        }
    }

    public function displayAllParameters()
    {
        foreach ($this->listOfFlags as $flag) {
            echo $flag->getAbbreviation() . ": " . $flag->getValue() . "\n";
        }
        echo "\n";
    }

    public function getParameterFromFlag($flagName)
    {
        try {
            $parameterValue = "";
            for ($i = 0; $i < count($this->listOfFlags); $i++) {
                $flag = $this->listOfFlags[$i];
                if ($flagName == $flag->getAbbreviation() || strcasecmp($flagName,$flag->getName()) == 0) {
                    $parameterValue = $flag->getValue();
                    echo "Value/s for flag : " . $flagName . " is/are: " . $parameterValue . "\n";
                }
            }
            if(empty($parameterValue)){
                throw new \Exception("No such flag was defined in the schema!\n");
            }
        } catch(\Exception $e) {
            echo $e;
        }
    }
}