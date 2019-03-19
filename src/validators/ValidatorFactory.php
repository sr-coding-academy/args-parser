<?php

namespace ArgsParser\validators;

use \Exception as Exception;

class ValidatorFactory
{
    /**
     * @param $flag
     * @return IValidator
     * @throws Exception
     */
    public static function chooseValidator($flag): IValidator
    {
        if ($flag === 'u') {
            return new ValidatorUser();
        } elseif ($flag === 'd') {
            return new ValidatorDirectory();
        } elseif ($flag === 'p') {
            return new ValidatorPort();
        } elseif ($flag === 'i') {
            return new ValidatorIntegerList();
        } elseif ($flag === 'f') {
            return new ValidatorStringList();
        } else {
            throw new Exception("{$flag} is invalid.");
        }
    }
}