<?php

namespace ArgsParser;


class Substring
{
    public $flag;
    public $value;

    public function __construct($flag, $value)
    {
        $this->flag = $flag;
        $this->value = $value;
    }
}