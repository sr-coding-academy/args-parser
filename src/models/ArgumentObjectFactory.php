<?php

namespace ArgsParser\models;

use ArgsParser\abstracts\ArgumentObject;
use ArgsParser\exceptions\ArgumentObjectException;

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