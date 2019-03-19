<?php


namespace ArgsParser;


class Display
{
    private $schema;

    public function __construct($flags, $schema = '-u -d -p -l -f -i')
    {
        $this->schema=$schema;
        $this->generateOutput($flags);
    }

    public function displayResult($flag)
    {
        echo $flag->getDescription() . ": ";
        var_dump($flag->getValue());
    }

    private function generateOutput($flags)
    {
        $schema=explode(' ', $this->schema);
        foreach($schema as $flagName){
            foreach($flags as $flag){
                if($flagName === $flag->getName()){
                    $this->displayResult($flag);
                }
            }
        }
    }
}