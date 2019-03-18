<?php

namespace ArgsParser;


class Parser
{
    private $flags;
    public $result;
    public $output;

    public function __construct()
    {
        $this->flags = ['u ', 'd ', 'p '];
        $this->result = [];
        $this->output = [];
    }

    public function parse($value)
    {
        $lastPosition=0;
        $continueWhile=true;
        while($continueWhile) {
            $pos = strpos($value, '-', $lastPosition);
            if ($pos!==false) {
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


    public function validateResult($flag, $defaultValue) {
        foreach($this->result as $substring){
            if($substring->flag === $flag){
               return  $substring->value . "\n";
            }
        }
        return $defaultValue."\n";
    }

    public function generateOutput(){
        echo "User: ".$this->validateResult('u ', "");
        echo "Directory: ".$this->validateResult('d ', "");
        echo "Port: ".$this->validateResult('p ', "0");
    }
}