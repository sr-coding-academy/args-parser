<?php
/**
 * Created by PhpStorm.
 * User: r.quidet
 * Date: 19.03.2019
 * Time: 08:28
 */

namespace ArgsParser\validators;


//use mysql_xdevapi\Exception;

class ValidatorFactory
{
    public static function chooseValidator($flag) : IValidator
    {
        if ($flag === 'u') {
            return new ValidatorUser();
        } elseif ($flag === 'd') {
            return new ValidatorDirectory();
        } elseif ($flag === 'p') {
            return new ValidatorPort();
        } else {
            echo "{$flag} is invalid.";
            //throw new Exception("{$flag} is invalid.");
        }
    }
}