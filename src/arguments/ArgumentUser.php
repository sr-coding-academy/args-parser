<?php

namespace ArgsParser\arguments;

use ArgsParser\abstracts\ArgumentObject;

class ArgumentUser extends ArgumentObject
{
    public function __construct()
    {
        $this->name = "User";
        $this->abbreviation = "u";
        $this->usage = "-u name (at least 3 characters, no special chars.)";
        $this->type = "string";
    }

    protected static function getStaticRegexPattern()
    {
        return "(([A-Za-z]{3,}){1})";
    }
}