<?php

namespace ArgsParser\validators;


class ValidatorDirectory implements IValidator
{
    /**
     * @param string $value
     * @return bool
     */
    public function validate($value)
    {
        $matches = preg_match("(^([/]{1})([A-Za-z]([/]{1}[A-Za-z])*)+([/]{1})$)", $value);
        if($matches == 0)
        {
            return false;
        }
        return true;
    }
}