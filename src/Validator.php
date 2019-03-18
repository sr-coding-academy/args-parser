<?php

namespace ArgsParser;


class Validator
{

    private $allowedFlags = [];

    public function __construct($allowedFlagsAsString)
    {
        $this->allowedFlags = $this->extractFlagsFromString($allowedFlagsAsString);
    }

    public function validate($input)
    {
        $matches = preg_match("(([-]{1}[a-z]{1}){1}([' ']+[A-Za-z/0-9]+){1})", $input);
        if($matches <= 0)
        {
            return false;
        }
        return true;
    }

    public function validateArray($array)
    {
        foreach ($array as $item) {
            $matches = preg_match("(([a-z]{1}){1}([' ']+[A-Za-z/0-9]+){1})", $item);
            if ($matches == false) {
                return false;
            }
        }
        return true;
    }

    public function getAllowedFlags()
    {
        return $this->allowedFlags;
    }

    private function extractFlagsFromString($allowedFlagsAsString)
    {
        $result = explode(',', $allowedFlagsAsString);
        return $result;
    }
}