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
            return new ArgumentUser();
        } elseif ($flag === 'd') {
            return new ArgumentDirectory();
        } elseif ($flag === 'p') {
            return new ArgumentPort();
        } else {
            throw new ArgumentObjectException("Creating object failed.");
        }
    }
}