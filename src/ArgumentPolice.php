<?php

namespace ArgsParser;

use Exception;

class ArgumentPolice
{
    /**
     * @var string[]
     */
    private $allowedFlags = [];

    /**
     * @param string $allowedFlagsAsString
     */
    public function __construct($allowedFlagsAsString)
    {
        $this->allowedFlags = $this->extractFlagsFromString($allowedFlagsAsString);
    }

    /**
     * @param string $allowedFlagsAsString
     * @return string[] $result
     */
    private function extractFlagsFromString($allowedFlagsAsString)
    {
        $result = explode(',', $allowedFlagsAsString);
        return $result;
    }

    /**
     * @param string $flag
     * @param string $value
     * @param string $item
     * @return bool
     * @throws Exception
     */
    public function validate($flag, $value, $item)
    {
        try {
            $validator = ValidatorFactory::chooseValidator($flag);
            if ($this->validateFormOfItem($item) === false) {
                throw new Exception("{$item} is invalid!");
            } elseif ($validator->validate($value) === false) {
                throw new Exception("{$value} is invalid!");
            }
        } catch (Exception $e) {
            echo $e;
        }
        return true;
    }

    /**
     * @param $item
     * @return bool
     */
    private function validateFormOfItem($item)
    {
        $matches = preg_match("((([a-z]){1})([' ']*[A-Za-z0-9/+_~,.-]*))", $item);
        if ($matches == 0) {
            return false;
        }
        return true;
    }

    /**
     * @return string[]
     */
    public function getAllowedFlags()
    {
        return $this->allowedFlags;
    }
}