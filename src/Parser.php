<?php

namespace ArgsParser;


class Parser
{
    public $flags;
    private $checker;

    public function __construct()
    {
        $this->flags = [new UserFlag('u '), new DirectoryFlag('d '), new PortFlag('p ')];
        $this->setChecker();

    }

    public function checkInputForFlags($value)
    {
        $lastPosition = 0;
        $continueWhile = true;
        while ($continueWhile) {
            $pos = strpos($value, '-', $lastPosition);
            if ($pos !== false) {
                $lastPosition = $pos + 1;
                $flag = substr($value, $pos + 1, 2);
                if (in_array($flag, $this->checker)) {
                    $subvalue = $this->generateValue($value, $pos);
                    $this->setParsedValue($flag, $subvalue);
                }
            } else {
                $continueWhile = false;
            }
        }
    }

    private function setParsedValue($flag, $subvalue)
    {
        foreach ($this->flags as $flagObject) {
            if ($flagObject->getName() === $flag) {
                $flagObject->setValue($subvalue);
                $flagObject->parse();
            }
        }
    }

    private function generateValue($value, $pos)
    {
        if ($nextPos = strpos($value, '-', $pos + 3)) {
            $subvalue = substr($value, $pos + 3, $nextPos - $pos - 4);
        } else {
            $subvalue = substr($value, $pos + 3);
        }
        return $subvalue;
    }

    private function setChecker()
    {
        foreach ($this->flags as $flag) {
            $this->checker[] = $flag->getName();
        }
    }
}