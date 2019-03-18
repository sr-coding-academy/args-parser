<?php

namespace ArgsParser;


class UserFlag extends Flag
{

    public function __construct($name)
    {
        parent::__construct($name);
        $this->defaultValue = "";
        $this->value = $this->defaultValue;
        $this->description="User";
    }

    public function parse() {
        $this->value = (string)$this->value;
    }

}