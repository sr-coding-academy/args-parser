<?php

namespace ArgsParser;

use ArgsParser\validators\ValidatorFactory;
use Exception;

class ArgumentPolice
{

    private $allowedFlags = [];

    public function __construct($allowedFlagsAsString)
    {
        $this->allowedFlags = $this->extractFlagsFromString($allowedFlagsAsString);
    }

    /**
     * @param $flag
     * @param $value
     * @param $item
     * @return bool
     * @throws Exception
     */
    public function validate($flag, $value, $item): bool
    {
        $validator = ValidatorFactory::chooseValidator($flag);
        if ($this->validateFormOfItem($item) == false ||
            $validator->validate($value) == false) {
            return false;
        }
        return true;
    }

    private function validateFormOfItem($item)
    {
        $matches = preg_match("((([a-z]){1})([' ']*[A-Za-z0-9/+_~,.-]*))", $item);
        if ($matches == 0) {
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