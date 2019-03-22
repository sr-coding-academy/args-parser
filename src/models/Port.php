<?php

namespace ArgsParser\models;


use ArgsParser\abstracts\ArgumentObject;

class Port extends ArgumentObject
{
    public function __construct()
    {
        $this->name = "Port";
        $this->abbreviation = "p";
        $this->usage = "-p port (1024 < port < 65535)";
        $this->type = "integer";
    }

    protected static function getStaticRegexPattern()
    {
        return "(([0-9]{4,}){1})";
    }

    public function setValue($value): void
    {
        $this->value = (int)$value;
    }
}