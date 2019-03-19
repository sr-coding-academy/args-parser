<?php

namespace ArgsParser;


class Parser
{
    public $flags;
    private $validFlags;

    public function __construct($value)
    {
        $this->flags = [new UserFlag(), new DirectoryFlag(), new PortFlag(), new BoolFlag(), new ListFlag(), new IntegerListFlag()];
        $this->setValidFlags();
        $this->checkInputForFlags($value);
        $this->parseValues();
    }

    private function checkInputForFlags($value)
    {
        $lastPosition = 0;
        $continueWhile = true;
        $previousFlag = '';

        while ($continueWhile) {
            $position = strpos($value, '-', $lastPosition);
            if ($position !== false) {
                $lastPosition = $position + 1;
                $flag = substr($value, $position, 2);
                if (in_array($flag, $this->validFlags)) {
                    $previousFlag = $flag;
                    $this->setFlagValue($value, $position + 1, $flag);
                } else {
                    $this->appendToFlagValue($value, $position, $previousFlag);
                }
            } else {
                $continueWhile = false;
            }
        }
    }

    private function parseValues()
    {
        foreach ($this->flags as $flagObject) {
            $flagObject->parse();
        }
    }

    private function setFlagValue($value, $position, $flag)
    {
        if ($nextPosition = strpos($value, '-', $position + 2)) {
            $flagValue = substr($value, $position + 2, $nextPosition - $position - 3);
        } else {
            $flagValue = substr($value, $position + 2);
        }

        foreach ($this->flags as $flagObject) {
            if ($flagObject->getName() === $flag) {
                $flagObject->setValue($flagValue);
            }
        }
    }

    private function appendToFlagValue($value, $position, $flag)
    {
        if ($nextPosition = strpos($value, '-', $position + 1)) {
            $flagValue = substr($value, $position - 1, $nextPosition - $position);
        } else {
            $flagValue = substr($value, $position - 1);
        }

        foreach ($this->flags as $flagObject) {
            if ($flagObject->getName() === $flag) {
                $flagObject->appendToValue($flagValue);
            }
        }
    }

    private function setValidFlags()
    {
        foreach ($this->flags as $flag) {
            $this->validFlags[] = $flag->getName();
        }
    }

}