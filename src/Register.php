<?php

namespace ArgsParser;

class Register
{
    private $data = [];

    public function __construct($allowedFlags)
    {
        $this->data = $this->initializeAllowedFlags($allowedFlags);
//        $this->data['u'][] = "test1";
//        $this->data['u'][] = "test2";
//        var_dump($this->data);
    }

    public function addValuesToRegister($rawData)
    {
        foreach ($rawData as $item) {
            $key = substr($item, 0,1);
            if (array_key_exists($key, $this->data)) {
                $positionOfLastWhiteSpace = strrpos($item, ' ')+1;
                $lengthOfValue = (int) strlen($item) - (int) $positionOfLastWhiteSpace;
                $this->data[$key][] = substr($item, $positionOfLastWhiteSpace, $lengthOfValue);
            }
        }
        var_dump($this->data);
    }

    public function addValue()
    {

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