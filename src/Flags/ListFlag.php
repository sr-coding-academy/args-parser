<?php

namespace ArgsParser;


class ListFlag extends Flag
{
    public function __construct()
    {
        $this->defaultValue = "";
        $this->name = "-f";
        $this->value = $this->defaultValue;
        $this->description = "Files";
    }

    public function parse()
    {
        $this->value = explode(',', $this->value);
    }
}