<?php

namespace ArgsParser\validators;

use ArgsParser\models\Directory;
use ArgsParser\models\Port;
use ArgsParser\models\User;

class Validator
{
    public static function validate($flag, $value)
    {
        if ($flag === 'u') {
            self::validateStringOnly(User::getRegexPattern(), $value);
        } elseif ($flag === 'd') {
            self::validateStringOnly(Directory::getRegexPattern(), $value);
        } elseif ($flag === 'p') {
            self::validatePort(Port::getRegexPattern(), $value);
        }

    }

    private static function validateStringOnly($regex, $value)
    {
        return preg_match("/{$regex}/", $value) ? true : false;
    }

    private static function validatePort($regex, $value)
    {
        return preg_match("/{$regex}/", $value) ? true : false;
        // TODO : Copy, Paste the thingy from ValidatorPort class
    }
}