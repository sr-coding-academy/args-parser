<?php

namespace ArgsParser\arguments;


use ArgsParser\abstracts\ArgumentObject;

class ArgumentPort extends ArgumentObject
{
    public function __construct()
    {
        $this->name = "Port";
        $this->abbreviation = "p";
        $this->usage = "-p port (1024 < port < 65535)";
        $this->type = "integer";
    }

    /**
     * @return string
     */
    protected static function getStaticRegexPattern()
    {
        return "(([0-9]{4,}){1})";
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = (int)$value;
    }
}