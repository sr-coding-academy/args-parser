<?php

namespace ArgsParser;

class Store
{
    private $register = [];

    public function __construct()
    {

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
}