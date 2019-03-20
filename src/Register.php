<?php

namespace ArgsParser;

class Register
{
    private $data = [];

    /**
     * @param string $allowedFlags
     */
    public function __construct($allowedFlags)
    {
        $this->data = $this->initializeAllowedFlags($allowedFlags);
    }

    /**
     * @param string $flag
     * @param string $value
     * @return void
     */
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

    /**
     * @param string $flag
     * @param string[] $components
     * @return void
     */
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

    /**
     * @param string $value
     * @param string $delimiter
     * @return string[] $values
     */
    private function extractValuesFromString($value, $delimiter)
    {
        $values = explode($delimiter, $value);
        return $values;
    }

    /**
     * @return string[][] $this->data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $flags
     * @return array[][] $initializedArray
     */
    private function initializeAllowedFlags($flags)
    {
        $initializedArray = array_fill_keys($flags, array());
        return $initializedArray;
    }
}