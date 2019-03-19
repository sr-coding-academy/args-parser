<?php

namespace ArgsParser\validators;


class ValidatorUser implements IValidator
{

    public function validate($item)
    {
        $matches = preg_match("(([u]{1}){1}([' ']+[A-Za-z]{3,}){1})", $item);
        if($matches <= 0)
        {
            return false;
        }
        return true;
    }
}