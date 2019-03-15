<?php

namespace ArgsParser;


class Substring
{
    private $flag;
    private $value;

    public function __construct($flag, $value)
    {
        $this->flag = $flag;
        $this->value = $value;
    }
}