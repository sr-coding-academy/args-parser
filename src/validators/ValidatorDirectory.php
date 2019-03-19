<?php

namespace ArgsParser\validators;


class ValidatorDirectory implements IValidator
{

    public function validate($item)
    {
        $matches = preg_match("(([d]{1}){1}([' '/]+[A-Za-z0-9/+_~-]+){1})", $item);
        if($matches <= 0)
        {
            return false;
        }
        return true;
    }
}