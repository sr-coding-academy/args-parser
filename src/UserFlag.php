<?php

namespace ArgsParser;


class UserFlag extends Flag
{

    public function __construct()
    {
        $this->defaultValue = "";
        $this->name = "u";
        $this->value = $this->defaultValue;
        $this->description="User";
    }

    public function parse() {
        $this->value = (string)$this->value;
    }

}