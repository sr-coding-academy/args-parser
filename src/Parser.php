<?php

namespace ArgsParser;


class Parser
{
    private $flags;
    public $result;

    public function __construct()
    {
        $this->flags = ['u ', 'd ', 'p '];
        $this->result = [];
    }

    public function parse($value)
    {

    }
}