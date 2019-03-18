<?php

namespace ArgsParser;


class Parser
{
    public $flags;
    private $checker;

    public function __construct($value)
    {
        $this->flags = [new UserFlag('u'), new DirectoryFlag('d'), new PortFlag('p'),new BoolFlag('l')];
        $this->setChecker();
        $this->checkInputForFlags($value);
    }

    private function checkInputForFlags($value)
    {
        $lastPosition = 0;
        $continueWhile = true;
        while ($continueWhile) {
            $pos = strpos($value, '-', $lastPosition);
            if ($pos !== false) {
                $lastPosition = $pos + 1;
                $flag = substr($value, $pos +1 , 1);
                if (in_array($flag, $this->checker)) {
                    $subvalue = $this->generateValue($value, $pos+1);
                    $this->setParsedValue($flag, $subvalue);
                }
            } else {
                $continueWhile = false;
            }
        }
    }

    #region Private Methods
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
        if ($nextPos = strpos($value, '-', $pos + 2)) {
            $subvalue = substr($value, $pos + 2, $nextPos - $pos - 3);
        } else {
            $subvalue = substr($value, $pos + 2);
        }
        return $subvalue;
    }

    private function setChecker()
    {
        foreach ($this->flags as $flag) {
            $this->checker[] = $flag->getName();
        }
    }
    #endregion

    public function displayResult(){
        foreach($this->flags as $flag){
            echo $flag->getDescription().": ";
            var_dump($flag->getValue());
        }
    }
}