<?php

namespace ArgsParser;

use ArgsParser\arguments\ArgumentDirectory;
use ArgsParser\arguments\ArgumentIntegerList;
use ArgsParser\arguments\ArgumentPort;
use ArgsParser\arguments\ArgumentStringList;
use ArgsParser\arguments\ArgumentUser;
use ArgsParser\exceptions\InvalidFlagException;

class Validator
{
    /**
     * @param $flag
     * @param $value
     * @return bool
     * @throws InvalidFlagException
     */
    public static function validate($flag, $value)
    {
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
        } else {
            throw new InvalidFlagException();
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
        $isValidRange = !(intval($value) < 1024 && intval($value) > 65535) ? true : false;
        return ($isValidRegex && $isValidRange) ? true : false;
    }

    private static function validateBool($flag) {
        return ($flag === 'l') ? true : false;
    }
}