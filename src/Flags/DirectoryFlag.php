<?php

namespace ArgsParser;


class DirectoryFlag extends Flag
{
    public function __construct()
    {
        $this->defaultValue = "";
        $this->name = "-d";
        $this->value = $this->defaultValue;
        $this->description = "Directory";
    }

    public function parse()
    {
        $this->value = (string)$this->value;
    }
}