<?php

namespace ArgsParser;


class PortFlag extends Flag
{
    public function __construct()
    {
        $this->defaultValue = 0;
        $this->name = "p";
        $this->value = $this->defaultValue;
        $this->description="Port";
    }

    public function parse()
    {
        $this->value = (int)$this->value;
    }
}