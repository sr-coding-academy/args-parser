<?php

namespace ArgsParser\validators;


class ValidatorUser implements IValidator
{
    private $type = "string";
    public function validate($value)
    {
        $matches = preg_match("(([A-Za-z]{3,}){1})", $value);
        if($matches == 0)
        {
            return false;
        }
        return true;
    }
}