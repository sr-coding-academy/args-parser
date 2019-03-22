<?php

namespace ArgsParser\validators;

use ArgsParser\exceptions\ValidatorException;
use ArgsParser\models\Directory;
use ArgsParser\models\Port;
use ArgsParser\models\User;

class Validator
{
    public static function validate($flag, $value)
    {
        $isValid = false;
        if ($flag == 'u') {
            $isValid = self::validateStringOnly(User::getRegexPattern(), $value);
        } elseif ($flag === 'd') {
            $isValid =  self::validateStringOnly(Directory::getRegexPattern(), $value);
        } elseif ($flag === 'p') {
            $isValid =  self::validatePort(Port::getRegexPattern(), $value);
        }
        return $isValid;
    }

    private static function validateStringOnly($regex, $value)
    {
        $isValid = (bool) preg_match("/{$regex}/", $value);
        return $isValid ? true : false;
    }

    private static function validatePort($regex, $value)
    {
        return preg_match("/{$regex}/", $value) ? true : false;
        // TODO : Copy, Paste the thingy from ValidatorPort class
    }
}