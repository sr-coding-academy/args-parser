<?php
/**
 * Created by PhpStorm.
 * User: r.quidet
 * Date: 19.03.2019
 * Time: 13:29
 */

namespace ArgsParser\validators;


class ValidatorStringList implements IValidator
{
    public function validate($value)
    {
        $matches = preg_match("([A-Za-z0-9._/-]+([,]{1}[A-Za-z0-9._/-]+)*)", $value);
        if($matches == 0)
        {
            return false;
        }
        return true;
    }
}