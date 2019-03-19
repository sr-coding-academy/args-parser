<?php

namespace ArgsParser;
use ArgsParser\validators\ValidatorFactory;

class ArgumentPolice
{

    private $allowedFlags = [];

    public function __construct($allowedFlagsAsString)
    {
        $this->allowedFlags = $this->extractFlagsFromString($allowedFlagsAsString);
    }

    public function validate($item) : bool
    {
        $flag = substr($item, 0,1);
        $validator = ValidatorFactory::chooseValidator($flag);

        if ($validator->validate($item) === false) {
            return false;
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