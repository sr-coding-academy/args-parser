<?php

namespace ArgsParser;

class Register
{
    private $data = [];

    public function __construct($allowedFlags)
    {
        $this->data = $this->initializeAllowedFlags($allowedFlags);
    }

    public function addValuesToRegister($item)
    {
        $flag = substr($item, 0,1);
        if (array_key_exists($flag, $this->data)) {
            $positionOfLastWhiteSpace = strrpos($item, ' ');
            $lengthOfValue = (int) strlen($item) - (int) $positionOfLastWhiteSpace;
            $this->data[$flag][] = substr($item, $positionOfLastWhiteSpace+1, $lengthOfValue);
        }
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $flags
     * @return array
     */
    private function initializeAllowedFlags($flags)
    {
        $initializedArray = array_fill_keys($flags, array());
        return $initializedArray;
    }
}