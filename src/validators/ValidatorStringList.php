<?php

namespace ArgsParser\validators;


class ValidatorStringList implements IValidator
{
    /**
     * @param string $value
     * @return bool
     */
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