<?php

namespace ArgsParser\arguments;

use ArgsParser\abstracts\ArgumentObject;

class ArgumentIntegerList extends ArgumentObject
{
    public function __construct()
    {
        $this->name = "Integer list";
        $this->abbreviation = "i";
        $this->usage = "-i 0,1,2,3,...";
        $this->type = "integer list";
    }

    protected static function getStaticRegexPattern()
    {
        return "([-]?[0-9]+([,]{1}[-]?[0-9]+)*)";
    }

    public function setValue($value): void
    {
        $this->value = array_map('intval', explode(',', $value));
    }

    public function displayValue(): string
    {
        $displayValue = "\n\t\t\t\t";
        foreach ($this->value as $item) {
            $displayValue .= "{$item}\n\t\t\t\t";
        }
        return $displayValue;
    }
}