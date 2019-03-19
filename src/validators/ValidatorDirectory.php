<?php

namespace ArgsParser\validators;


class ValidatorDirectory implements IValidator
{
    public function validate($value)
    {
        $matches = preg_match("(([/]{1}[A-Za-z0-9/+_~-]+[/]{1})*)", $value);
        if($matches == 0)
        {
            return false;
        }
        return true;
    }
}