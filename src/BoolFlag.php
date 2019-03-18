<?php

namespace ArgsParser;


class BoolFlag extends Flag
{
    public function __construct()
    {
        $this->defaultValue = false;
        $this->name = "l";
        $this->value = $this->defaultValue;
        $this->description="Logging";
    }

    public function parse()
    {
      $this->value = (boolean)$this->value;
    }
}