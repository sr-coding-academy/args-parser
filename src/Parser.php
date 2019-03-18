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
        $lastPosition=0;
        $continueWhile=true;
        while($continueWhile) {
            if ($pos = strpos($value, '-', $lastPosition)) {
                $lastPosition = $pos+1;
                $flag = substr($value, $pos + 1, 2);
                if (in_array($flag, $this->flags)) {
                    if ($nextPos=strpos($value, '-', $pos + 3)) {
                        $subvalue = substr($value, $pos + 3, $nextPos - $pos - 3);
                    } else {
                        $subvalue = substr($value, $pos + 3);
                    }
                    $this->result[] = new Substring($flag, $subvalue);
                }
            } else {
                $continueWhile=false;
            }
        }
    }
}