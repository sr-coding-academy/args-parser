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
        if ($pos = strpos($value, '-')) {
            $flag = substr($value, $pos + 1, 2);
            if (in_array($flag, $this->flags)) {
                if (strpos($value, '-', $pos + 3)) {
                    $subvalue = substr($value, $pos + 3, strpos($value, '-') - $pos + 3);
                } else {
                    $subvalue = substr($value, $pos + 3);
                }
                $results[] = new Substring($flag, $subvalue);
            } else {
                echo 'No valid Flag found!';
            }
        } else {
            echo 'No valid Flag found!';
        }
    }
}