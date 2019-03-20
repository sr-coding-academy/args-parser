<?php

namespace ArgsParser\validators;


class ValidatorIntegerList implements IValidator
{
    /**
     * @param string $value
     * @return bool
     */
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