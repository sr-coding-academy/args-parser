<?php

namespace ArgsParser\models;

use ArgsParser\exceptions\ArgumentObjectException;
use Exception;

class ArgumentObjectFactory
{
    /**
     * @param string $flag
     * @return ArgumentObject
     * @throws ArgumentObjectException
     */
    public static function createArgumentObject($flag)
    {
        if ($flag === 'u') {
            return new User();
        } elseif ($flag === 'd') {
            return new Directory();
        } elseif ($flag === 'p') {
            return new Port();
        } else {
            throw new ArgumentObjectException("Creating object failed.");
        }
    }
}