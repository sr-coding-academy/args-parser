<?php

namespace ArgsParser\arguments;

use ArgsParser\abstracts\ArgumentObject;

class ArgumentStringList extends ArgumentObject
{
    public function __construct()
    {
        $this->name = "String list";
        $this->abbreviation = "f";
        $this->usage = "-i str1,str2,str3,...";
        $this->type = "string list";
    }

    /**
     * @return string
     */
    protected static function getStaticRegexPattern()
    {
        return "([A-Za-z0-9._/-]+([,]{1}[A-Za-z0-9._/-]+)*)";
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = explode(',', $value);
    }

    /**
     * @return string
     */
    public function displayValue(): string
    {
        $displayValue = "\n\t\t\t";
        foreach ($this->value as $item) {
            $displayValue .= "{$item}\n\t\t\t";
        }
        return $displayValue;
    }
}