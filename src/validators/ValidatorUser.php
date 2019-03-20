<?php

namespace ArgsParser\validators;


class ValidatorUser implements IValidator
{
    /**
     * @param string $value
     * @return bool
     */
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