<?php

namespace ArgsParser;


class PortFlag extends Flag
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->defaultValue = 0;
        $this->value = $this->defaultValue;
        $this->description="Port";
    }

    public function parse()
    {
        $this->value = (int)$this->value;
    }
}