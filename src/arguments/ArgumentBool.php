<?php

namespace ArgsParser\arguments;

use ArgsParser\abstracts\ArgumentObject;

class ArgumentBool extends ArgumentObject
{
    public function __construct()
    {
        $this->name = "Bool";
        $this->abbreviation = "l";
        $this->usage = "-l (No specified value needed, true if given in argument.)";
        $this->type = "bool";
        $this->setValue(false);
    }

    protected static function getStaticRegexPattern()
    {
        return "(no regex)";
    }

    /**
     * @return string
     */
    public function displayValue(): string
    {
        return self::getValue() ? "true" : "false";
    }
}