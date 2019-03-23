<?php

namespace ArgsParser;

use ArgsParser\arguments\ArgumentDirectory;
use ArgsParser\arguments\ArgumentIntegerList;
use ArgsParser\arguments\ArgumentPort;
use ArgsParser\arguments\ArgumentStringList;
use ArgsParser\arguments\ArgumentUser;

class Validator
{
    public static function validate($flag, $value)
    {
        $isValid = false;
        if ($flag == 'u') {
            $isValid = self::validateStringOnly(ArgumentUser::getRegexPattern(), $value);
        } elseif ($flag === 'd') {
            $isValid =  self::validateStringOnly(ArgumentDirectory::getRegexPattern(), $value);
        } elseif ($flag === 'i') {
            $isValid = self::validateStringOnly(ArgumentIntegerList::getRegexPattern(), $value);
        } elseif ($flag === 'f') {
            $isValid = self::validateStringOnly(ArgumentStringList::getRegexPattern(), $value);
        } elseif ($flag === 'p') {
            $isValid =  self::validatePort(ArgumentPort::getRegexPattern(), $value);
        } elseif ($flag === 'l') {
            $isValid = self::validateBool($flag);
        }
        return $isValid;
    }

    private static function validateStringOnly($regex, $value)
    {
        $isValid = (bool) preg_match("({$regex})", $value);
        return $isValid ? true : false;
    }

    private static function validatePort($regex, $value)
    {
        $isValidRegex = (bool) preg_match("({$regex})", $value);
        $isValidRange = !(intval($value) > 1024 && intval($value)) ? true : false;
        return ($isValidRegex && $isValidRange) ? true : false;
    }

    private static function validateBool($flag) {
        return ($flag === 'l') ? true : false;
    }
}