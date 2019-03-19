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
            if ($flag == "p") {
                $this->data[$flag][] = (int) $value;
            } elseif ($flag == "i" || $flag == "f") {
                $components = $this->extractValuesFromString($value, ",");
                $this->saveComponentsFromList($flag, $components);
            } else {
                $this->data[$flag][] = $value;
            }
        }
    }

    private function saveComponentsFromList($flag, $components)
    {
        foreach ($components as $item) {
            if ($flag == "i") {
                $this->data[$flag][] = (int) $item;
            } else {
                $this->data[$flag][] = $item;
            }
        }
    }

    private function extractValuesFromString($value, $delimiter)
    {
        $values = explode($delimiter, $value);
        return $values;
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