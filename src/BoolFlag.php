<?php

namespace ArgsParser;


class BoolFlag extends Flag
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->defaultValue = false;
        $this->value = $this->defaultValue;
        $this->description="Logging";
    }

    public function parse()
    {
      $this->value = (boolean)$this->value;
    }
}