<?php

namespace ArgsParser\arguments;

use ArgsParser\abstracts\ArgumentObject;

class ArgumentDirectory extends ArgumentObject
{
    public function __construct()
    {
        $this->name = "Directory";
        $this->abbreviation = "d";
        $this->usage = "-d /dir/.../target-dir/";
        $this->type = "string";
    }

    protected static function getStaticRegexPattern()
    {
        return "(^([/]{1})([A-Za-z]([/]{1}[A-Za-z])*)+([/]{1})$)";
    }
}