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
                $this->data[$key][] = substr($item, strlen($item));
            }
        }
        var_dump($this->data);
    }

    public function addAllowedFlags($array)
    {
        foreach ($array as $item) {
            $this->allowedFlags[] = substr($item, 0, 1);
        }
    }

    public function addValue()
    {

    }

    public function getRegister()
    {
        return $this->register;
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