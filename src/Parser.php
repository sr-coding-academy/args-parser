<?php

namespace ArgsParser;


class Parser
{
    public $flags;
    private $checker;

    public function __construct($value)
    {
        $this->flags = [new UserFlag(), new DirectoryFlag(), new PortFlag(), new BoolFlag(), new ListFlag(), new IntegerListFlag()];
        $this->setChecker();
        $this->checkInputForFlags($value);
        $this->parseValues();
    }

    private function checkInputForFlags($value)
    {
        $lastPosition = 0;
        $continueWhile = true;
        $previousFlag='';
        while ($continueWhile) {
            $pos = strpos($value, '-', $lastPosition);
            if ($pos !== false) {
                $lastPosition = $pos + 1;
                $flag = substr($value, $pos, 2);
                if (in_array($flag, $this->checker)) {
                    $previousFlag=$flag;
                    $this->generateValue($value, $pos + 1, $flag);
                } else {
                    $this->completeValue($value, $pos, $previousFlag);
                }
            } else {
                $continueWhile = false;
            }
        }
    }

    #region Private Methods
    private function parseValues()
    {
        foreach ($this->flags as $flagObject) {
            $flagObject->parse();
        }
    }

    private function generateValue($value, $pos, $flag)
    {
        if ($nextPos = strpos($value, '-', $pos + 2)) {
            $subvalue = substr($value, $pos + 2, $nextPos - $pos - 3);
        } else {
            $subvalue = substr($value, $pos + 2);
        }

        foreach ($this->flags as $flagObject){
            if($flagObject->getName()===$flag){
                $flagObject->setValue($subvalue);
            }
        }
    }

    private function completeValue($value, $pos, $flag)
    {
        if ($nextPos = strpos($value, '-', $pos+1)) {
            $subvalue = substr($value, $pos-1, $nextPos - $pos);
        } else {
            $subvalue = substr($value, $pos-1);
        }

        foreach ($this->flags as $flagObject){
            if($flagObject->getName()===$flag){
                $flagObject->appendToValue($subvalue);
            }
        }
    }

    private function setChecker()
    {
        foreach ($this->flags as $flag) {
            $this->checker[] = $flag->getName();
        }
    }

#endregion

}