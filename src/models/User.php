<?php

namespace ArgsParser\models;

use ArgsParser\abstracts\ArgumentObject;

class User extends ArgumentObject
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
        return "((([0-9]{4,}){1}))";
    }
}