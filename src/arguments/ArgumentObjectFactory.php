<?php

namespace ArgsParser\arguments;

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
        } elseif ($flag === 'i') {
            return new ArgumentIntegerList();
        } elseif ($flag === 'f') {
            return new ArgumentStringList();
        } else {
            throw new ArgumentObjectException("Creating object failed.");
        }
    }
}