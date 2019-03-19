<?php


namespace ArgsParser;


class Display
{
    private $schema;

    public function __construct($schema = '-u -d -p -l -f -i')
    {
        $this->schema=$schema;
    }

    public function displayResult($flags)
    {
        foreach ($flags as $flag) {
            echo $flag->getDescription() . ": ";
            var_dump($flag->getValue());
        }
    }
}