<?php

namespace ArgsParser;

class Register
{
    private $data = [];

    public function __construct($allowedFlags)
    {
        $this->data = $this->initializeAllowedFlags($allowedFlags);
    }

    public function addValuesToRegister($flag, $value)
    {
        if (array_key_exists($flag, $this->data)) {
            $this->data[$flag][] = $value;
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