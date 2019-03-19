<?php
/**
 * Created by PhpStorm.
 * User: r.quidet
 * Date: 19.03.2019
 * Time: 13:28
 */

namespace ArgsParser\validators;


class ValidatorIntegerList implements IValidator
{
    public function validate($value)
    {
        $matches = preg_match("([-]?[0-9]+([,]{1}[-]?[0-9]+)*)", $value);
        if($matches == 0)
        {
            return false;
        }
        return true;
    }
}