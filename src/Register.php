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

    public function addValuesToRegister($array)
    {
        foreach ($array as $item) {
            $this->register[] = array(
                substr($item, 0, 1) => array(
                    ltrim(substr($item, strpos($item, ' '), strlen($item)))
                    )
            );
        }
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