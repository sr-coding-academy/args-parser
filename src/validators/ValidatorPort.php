<?php

namespace ArgsParser\validators;


class ValidatorPort implements IValidator
{
    private $type = "integer";

    public function validate($value)
    {
        $matches = preg_match("(([0-9]{4,}){1})", $value);
        if ($matches == 0 ||
            !(intval($value) > 1024 && intval($value) <= 65535)) {
            return false;
        }
        return true;
    }
}